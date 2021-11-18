<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function index($category = null)
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name as category')
            ->limit(10)
            ->latest('posts.created_at')
            // ->get();
            ->paginate(5);

        $counts = DB::table('posts')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->select('posts.id', DB::raw('count(comments.id) as count'))
            ->groupBy('posts.id')
            ->limit(10)
            ->latest('posts.created_at')
            // ->get();
            ->paginate(5);

        return view('welcome', compact('posts', 'counts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('post', compact('post'));
    }
    public function categories()
    {
        $categories = DB::table('categories')
            ->leftJoin('posts', 'categories.id', '=', 'posts.category_id')
            ->select('categories.id', 'categories.name', DB::raw('count(posts.id) as count'))
            ->groupBy('categories.id')
            ->get();
        return view('categories', compact('categories'));
    }
}
