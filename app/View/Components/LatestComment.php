<?php

namespace App\View\Components;

use App\Models\Comment;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class LatestComment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $comments = DB::table('comments')
        ->join('posts', 'comments.post_id', '=', 'posts.id')
        ->select('comments.comment', 'posts.slug', 'posts.title')
        ->limit(5)
        ->latest('comments.created_at')
        ->get();
        return view('components.latest-comment', compact('comments'));
    }
}
