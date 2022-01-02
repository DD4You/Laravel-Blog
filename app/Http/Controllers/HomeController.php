<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function all_posts(Request $request)
    {
        if ($request->exists('search')) {
            $posts = Post::with('category:id,name', 'comments:id')->where('posts.title', 'LIKE', '%' . $request->search . '%')
                ->latest('posts.created_at')
                ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
            $posts->appends(['search' => $request->search]);
        } else {
            $posts = Post::with('category:id,name', 'comments:post_id')->latest('posts.created_at')
                ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        }

        return view('welcome', compact('posts'));
    }
    public function category_post($category)
    {
        $posts = Post::with('category:id,name', 'comments:id')
            ->where('posts.category_id', '=', $category)
            ->latest('posts.created_at')
            ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
            
        return view('welcome', compact('posts'));
    }

    public function full_post($slug)
    {
        $post = Post::with('comments:post_id,comment')
            ->where('posts.slug', '=', $slug)
            ->first(['id', 'thumbnail', 'title', 'description']);

        return view('post', compact('post'));
    }
    public function categories()
    {
        $categories = Category::with('posts:category_id')->get();
        return view('categories', compact('categories'));
    }

    public function add_comment(Request $request)
    {
        $data = new Comment;
        $data->post_id = $request->post_id;
        $data->comment = $request->comment;
        $data->save();
        return redirect()->back();
    }
}
