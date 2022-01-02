<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function post($id = null)
    {
        if ($id) {
            return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                ->where('id', '=', $id)
                ->first(['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        } else {
            return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                ->latest('created_at')
                ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        }
    }
    public function category($id = null)
    {
        if ($id) {
            return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                ->where('category_id', '=', $id)
                ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        } else {
            return Category::all(['id', 'name']);
        }
    }

    public function search($s)
    {
        $posts = Post::with('category:id,name', 'comments:post_id,comment,updated_at')
            ->where('posts.title', 'LIKE', '%' . $s . '%')
            ->latest('posts.created_at')
            ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        if ($posts->count()) {
            return $posts;
        } else {
            return ['result' => 'no result found'];
        }
    }

    public function add_comment(Request $request)
    {
        $data = new Comment;
        $data->post_id = $request->post_id;
        $data->comment = $request->comment;

        if ($data->save()) {
            return ['result' => 'done'];
        } else {
            return ['result' => 'fail'];
        }
    }
}
