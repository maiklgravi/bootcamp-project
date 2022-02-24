<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'duration'=>$this->faker->numberBetween(100, 250),
            'actors'=> $this->faker->name(),
            'screenwriter'=> $this->faker->name(),
            'country'=> $this->faker->city(),
            'film_id'=> $this->faker->unique()->randomDigit(30)
        ];
    }
}
