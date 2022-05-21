<?php

namespace Database\Factories;

use App\Models\HomePage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecondPage>
 */
class SecondPageFactory extends Factory
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
            'home_slug' => HomePage::factory()->create(),
            'img' => $this->faker->imageUrl(900, 620),
            'created_at' => now(),
        ];
    }
}
