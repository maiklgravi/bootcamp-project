<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image('storage/app/public');
        $imageName = pathinfo($image, PATHINFO_FILENAME) . '.' . pathinfo($image, PATHINFO_EXTENSION);
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'blog_category_id' => BlogCategory::factory(),
            'author_id' => User::factory(),
            'published_at' => $this->faker->dateTime(),
            'excerpt' => $this->faker->sentence(),
            'image' => $imageName,
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence(),
        ];
    }
}