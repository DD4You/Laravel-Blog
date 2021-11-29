<?php

namespace App\Http\Controllers;

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
            $data['post'] = Post::select('id', 'thumbnail', 'title', 'description')->find($id);
            $data['comments'] = DB::table('comments')
                ->join('posts', 'comments.post_id', '=', 'posts.id')
                ->where('posts.id', '=', $id)
                ->select('comments.comment')
                ->latest('comments.created_at')
                ->get();
            return $data;
        } else {

            return DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->select('posts.id', 'posts.thumbnail', 'posts.title', 'posts.description', 'posts.created_at', 'categories.name as category', DB::raw('count(comments.id) as total_comment'))
                ->groupBy('posts.id')
                ->latest('posts.created_at')
                ->paginate(5);
        }
    }
    public function category($id = null)
    {
        if ($id) {
            return  DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->where('posts.category_id', '=', $id)
                ->select('posts.id', 'posts.thumbnail', 'posts.title', 'posts.description', 'posts.created_at', 'categories.name as category', DB::raw('count(comments.id) as total_comment'))
                ->groupBy('posts.id')
                ->limit(10)
                ->latest('posts.created_at')
                ->paginate(5);
        } else {
            return DB::table('categories')
                ->leftJoin('posts', 'categories.id', '=', 'posts.category_id')
                ->select('categories.id', 'categories.name', DB::raw('count(posts.id) as total_post'))
                ->groupBy('categories.id')
                ->get();
        }
    }

    public function search($s)
    {
            $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->where('posts.title', 'LIKE', '%' . $s . '%')
                // ->where('posts.description', 'LIKE', '%' . $s . '%')
                ->select('posts.id', 'posts.thumbnail', 'posts.title', 'posts.description', 'posts.created_at', 'categories.name as category', DB::raw('count(comments.id) as total_comment'))
                ->groupBy('posts.id')
                ->latest('posts.created_at')
                ->paginate(5);
                if(count($posts->items())){
                    return $posts;
                }else{
                    return ['result'=>'no result found'];
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
