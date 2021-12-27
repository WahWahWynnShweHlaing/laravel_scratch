<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * the name of the factory's corresponding model
     * 
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug'=> $this->faker->slug,
            'title'=> $this->faker->sentence,
            'excerpt'=> $this->faker->sentence,
            'body'=> $this->faker->paragraph
        ];
    }
}
