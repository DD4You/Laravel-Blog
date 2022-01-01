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
        $comments = Comment::limit(5)
            ->latest()
            ->get();
        return view('components.latest-comment', compact('comments'));
    }
}
