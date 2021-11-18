<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
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
        // $categories = Category::limit(5)->latest()->get();
        $categories = DB::table('categories')->leftJoin('posts', 'categories.id', '=', 'posts.category_id')
            ->select('categories.id', 'categories.name', DB::raw('count(posts.id) as count'))
            ->groupBy('categories.id')
            ->get();
        return view('components.side-categories', compact('categories'));
    }
}
