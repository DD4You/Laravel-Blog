<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class LatestBlog extends Component
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
        $blogs = Post::limit(5)->latest()->get(['title', 'slug', 'thumbnail', 'description']);
        return view('components.latest-blog', compact('blogs'));
    }
}
