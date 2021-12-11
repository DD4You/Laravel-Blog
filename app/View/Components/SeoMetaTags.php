<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Models\Post;

class SeoMetaTags extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $description;
    public $image;
    public $url;

    public function __construct()
    {
        //
        $this->title = "My Blog";
        $this->description = "Blogging the reel world";
        $this->image = asset('assets/image/logo.png');
        $this->url = URL::current();

        if (Route::current()->uri() == "post/{slug}") {

            $post = Post::where('slug', request()->segment(2))
                ->select('title', 'description', 'thumbnail')
                ->first();

            $this->title = $post->title;
            $this->description = strip_tags($post->description);
            $this->image = asset('uploads/post/' . $post->thumbnail);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.seo-meta-tags');
    }
}
