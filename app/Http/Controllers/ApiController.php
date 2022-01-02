<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
            $cacheKey = 'post-' . $id;
            $data = Cache::remember($cacheKey, 60 * 60, function () use ($id) {
                return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                    ->where('id', '=', $id)
                    ->first(['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
            });
        } else {
            $page = request()->get('page', 1);
            $cacheKey = 'posts-' . $page;
            $data = Cache::remember($cacheKey, 60 * 60, function () {
                return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                    ->latest('created_at')
                    ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
            });
        }

        return response($data, 200);
    }
    public function category($id = null)
    {
        if ($id) {
            $page = request()->get('page', 1);
            $data = Cache::remember('posts-catid-' . $id . '-page-' . $page, 60 * 60, function () use ($id) {
                return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                    ->where('category_id', '=', $id)
                    ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
            });
        } else {
            $data = Category::all(['id', 'name']);
        }
        return response($data, 200);
    }

    public function search($s)
    {
        $page = request()->get('page', 1);
        $data = Cache::remember('post-search-' . $page, 60 * 60, function () use ($s) {
            return Post::with('category:id,name', 'comments:post_id,comment,updated_at')
                ->where('posts.title', 'LIKE', '%' . $s . '%')
                ->latest('posts.created_at')
                ->paginate(5, ['id', 'category_id', 'thumbnail', 'title', 'slug', 'description']);
        });
        if ($data->count()) {
            return $data;
        } else {
            $data = ['result' => 'no result found'];
        }
        return response($data, 200);
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
