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
            'title_en' => $this->faker->name(),
            'title_az' => $this->faker->name(),
            'title_ru' => $this->faker->name(),
            'title_tr' => $this->faker->name(),
            'img' => $this->faker->imageUrl(900, 620),
            'created_at' => now(),
        ];
    }
}
