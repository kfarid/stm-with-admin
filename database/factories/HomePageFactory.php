<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomePage>
 */
class HomePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_en' => $this->faker->title(),
            'title_az' => $this->faker->title(),
            'title_ru' => $this->faker->title(),
            'title_tr' => $this->faker->title(),
            'img' => $this->faker->image(config('public/files'),640,480, null, false),
            'created_at' => now(),
        ];
    }
}
