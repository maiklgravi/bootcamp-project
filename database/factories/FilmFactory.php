<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
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
            'name' => $this->faker->unique()->name(),
            'description' => $this->faker->paragraph(),
            'image' => $imageName,
            'date'=>$this->faker->date(),
            'description'=>$this->faker->sentence(),
            'public_availability'=>$this->faker->randomElement([
                '0',
                '1'
            ]),
            'dislike'=>$this->faker->numberBetween(1, 500),
            'like'=>$this->faker->numberBetween(1, 500) ,
        ];
    }
}
