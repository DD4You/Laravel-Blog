<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(50);
        return [
            'category_id' => Category::all()->random()->id,
            'user_id' => 0,
            'thumbnail' => 'post-img.webp',
            'title' => $title,
            'slug' => SlugService::createSlug(Post::class, 'slug', $title),
            'description' => $this->faker->paragraph(20),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
