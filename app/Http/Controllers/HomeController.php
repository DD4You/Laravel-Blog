<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function all_posts(Request $request)
    {
        if ($request->exists('search')) {
            $search = $request->search;
            $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->where('posts.title', 'LIKE', '%' . $search . '%')
                // ->where('posts.description', 'LIKE', '%' . $search . '%')
                ->select('posts.*', 'categories.name as category', DB::raw('count(comments.id) as count'))
                ->groupBy('posts.id')
                ->latest('posts.created_at')
                ->paginate(5);
            $posts->appends(['search' => $request->search]);
        } else {
            $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->select('posts.*', 'categories.name as category', DB::raw('count(comments.id) as count'))
                ->groupBy('posts.id')
                ->latest('posts.created_at')
                ->paginate(5);
        }

        return view('welcome', compact('posts'));
    }
    public function category_post($category)
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->where('posts.category_id', '=', $category)
            ->select('posts.*', 'categories.name as category', DB::raw('count(comments.id) as count'))
            ->groupBy('posts.id')
            ->limit(10)
            ->latest('posts.created_at')
            ->paginate(5);
        return view('welcome', compact('posts'));
    }

    public function full_post($slug)
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
