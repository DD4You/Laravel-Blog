<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        // $data = User::where('id', '=', session('LoggedUser'))->first();
        $data['posts'] = Post::all(['id'])->count();
        $data['categories'] = Category::all(['id'])->count();
        $data['comments'] = Comment::all(['id'])->count();

        return view('admin.dashboard', compact('data'));
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/admin/login');
        }
    }

    public function login()
    {
        return view('admin.login');
    }
    public function check(Request $request)
    {
        // Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function forgot()
    {
        return view('admin.forgot');
    }
    public function reset()
    {
        return view('admin.reset');
    }
    public function forgot_password(Request $request)
    {
        // Validate requests
        $request->validate([
            'email' => 'required|email'
        ]);
        $userInfo = User::where('email', '=', $request->email)->first();
        if (!$userInfo) {
            return back()->with('msg', 'We do not recognize your email address');
        } else {

            $token = Str::random(30);


            $to_name = $userInfo->name;
            $to_email = $request->email;

            $html = 'A test mail 5';


            //send email
            $subject = 'Test Subject';
            Mail::html(
                $html,
                function ($message) use ($to_email, $to_name, $subject) {
                    $message
                        ->to($to_email, $to_name)
                        ->subject($subject);
                }
            );
            return back()->with('msg', 'Password Reset Link send Successfully.');
        }
    }

    public function categories()
    {
        $data = Category::paginate(5, ['id', 'name']);
        return view('admin.categories', compact('data'));
    }

    public function manage_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            if ($request->id) {
                $data = Category::find($request->id);
                $data->name = $request->name;
                $data->save();
                return response()->json(['success' => 'Updated category.']);
            } else {
                $data = new Category;
                $data->name = $request->name;
                $data->save();
                return response()->json(['success' => 'Added new category.']);
            }
        }
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        if ($data->delete()) {
            return back()->with('msg', 'Delete Successfully.');
        } else {
            return back()->with('msg', 'Failed to Delete.');
        }
    }
    public function posts()
    {
        $data = Post::paginate(4, ['id', 'thumbnail', 'title', 'description']);
        return view('admin.posts', compact('data'));
    }
    public function delete_post($id)
    {
        $data = Post::find($id);
        if ($data->delete()) {
            return back()->with('msg', 'Delete Successfully.');
        } else {
            return back()->with('msg', 'Failed to Delete.');
        }
    }
    public function add_post()
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.add_post', compact('categories'));
    }
    public function edit_post($id)
    {
        $post = Post::find($id);

        $data['categories'] = Category::all(['id', 'name']);
        $data['post'] = Post::find($id);
        return view('admin.edit_post', compact('data'));
    }

    public function create_post(Request $request)
    {
        // Validate requests
        $request->validate([
            'category_id' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048|dimensions:ratio=2/1',
            'title' => 'required',
            'description' => 'required'
        ]);

        $thumbnail = time() . '_' . $request->thumbnail->getClientOriginalName();
        $request->thumbnail->move('uploads/post', $thumbnail);

        $data = new Post;
        $data->thumbnail = $thumbnail;
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $data->description = $request->description;
        $data->save();

        return back()->with('msg', 'New Post Added');
    }
    public function update_post(Request $request)
    {
        // Validate requests
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($request->thumbnail) {
            $request->validate([
                'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048|dimensions:ratio=2/1',
            ]);
            $data = Post::find($request->id);
            # Delete Old Image
            unlink("uploads/post/" . $data->thumbnail);
            # Update Image
            $thumbnail = time() . '_' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move('uploads/post', $thumbnail);
            $data->thumbnail = $thumbnail;
        } else {
            $data = Post::find($request->id);
        }

        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $data->description = $request->description;
        $data->save();

        return back()->with('msg', 'Post Updated');
    }
}
