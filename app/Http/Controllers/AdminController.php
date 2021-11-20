<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $data = User::where('id', '=', session('LoggedUser'))->first();
        return view('admin.dashboard', compact('data'));
    }

    public function logout()
    {
       if(session()->has('LoggedUser')){
           session()->pull('LoggedUser');
           return redirect('/auth/login');
       }
    }

    public function login()
    {
        return view('auth.login');
    }
    public function check(Request $request)
    {
        // Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = User::where('email','=', $request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function categories()
    {
        $data = Category::all();
        return view('admin.categories', compact('data'));
    }
    public function posts()
    {
        $data = Post::all();
        return view('admin.posts', compact('data'));
    }
}
