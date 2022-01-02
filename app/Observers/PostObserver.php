<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        // Cache::forget('posts');
        Artisan::call('cache:clear');
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        // Cache::forget('posts');
        Artisan::call('cache:clear');
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        // Cache::forget('posts');
        Artisan::call('cache:clear');
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        // Cache::forget('posts');
        Artisan::call('cache:clear');
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        // Cache::forget('posts');
        Artisan::call('cache:clear');
    }

    // private static function forgetCaches($prefix)
    // {
    //     for ($i = 1; $i < 1000; $i++) {
    //         $key = $prefix . $i;
    //         if (Cache::has($key)) {
    //             Cache::forget($key);
    //         } else {
    //             break;
    //         }
    //     }
    // }
}
