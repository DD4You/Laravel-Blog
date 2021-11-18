<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Blog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $imageLeft = true;
    public $postDate = '';
    public $thumbnail = '';
    public $title = '';
    public $slug = '';
    public $description = '';
    public $category = '';
    public $commentCount = 0;
    public $timeToRead = 0;
    
    public function __construct($imageLeft, $post, $comment)
    {
        //
        $this->imageLeft = $imageLeft;
        $this->postDate = $post->updated_at;
        $this->thumbnail = $post->thumbnail;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->description = Str::substr($post->description, 0, 180). '...';
        $this->category = $post->category;
        $this->commentCount = $comment->count;
        $this->timeToRead = round(0.0032 * Str::length($post->description));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog');
    }
}
