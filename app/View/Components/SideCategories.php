<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class SideCategories extends Component
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
        $categories = Category::with('posts:category_id')->get(['id', 'name']);
        return view('components.side-categories', compact('categories'));
    }
}
