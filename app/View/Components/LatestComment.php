<?php

namespace App\View\Components;

use App\Models\Comment;
use Illuminate\View\Component;

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
        $comments = Comment::with('post:id,title,slug')->limit(5)
            ->latest()
            ->get(['id', 'post_id', 'comment']);
        return view('components.latest-comment', compact('comments'));
    }
}
