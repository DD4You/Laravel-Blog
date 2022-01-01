<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function post($id = null)
    {
        if ($id) {
            return Post::with('category', 'comments')
                ->where('posts.id', '=', $id)->first();
        } else {

            //     ->select('posts.id', 'posts.thumbnail', 'posts.title', 'posts.description', 'posts.created_at', 'categories.name as category', DB::raw('count(comments.id) as total_comment'))

            return Post::with('category', 'comments')
                ->latest('posts.created_at')
                ->paginate(5);
        }
    }
    public function category($id = null)
    {
        if ($id) {
           
            //     ->select('posts.id', 'posts.thumbnail', 'posts.title', 'posts.description', 'posts.created_at', 'categories.name as category', DB::raw('count(comments.id) as total_comment'))

            return Post::with('category', 'comments')
            ->where('posts.category_id', '=', $id)
            ->paginate(5);
        } else {
            return Category::all();
        }
    }

    public function search($s)
    {
        $posts = Post::with('category', 'comments')
            ->where('posts.title', 'LIKE', '%' . $s . '%')
            ->latest('posts.created_at')
            ->paginate(5);
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
