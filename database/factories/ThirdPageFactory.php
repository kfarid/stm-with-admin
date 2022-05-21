<?php

namespace Database\Factories;

use App\Models\SecondPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThirdPage>
 */
class ThirdPageFactory extends Factory
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
            'textarea_en' => $this->faker->realText(600),
            'textarea_az' => $this->faker->realText(600),
            'textarea_ru' => $this->faker->realText(600),
            'textarea_tr' => $this->faker->realText(600),
            'second_slug' => SecondPage::factory()->create(),
            'img' => $this->faker->imageUrl(1300, 970),
            'created_at' => now(),
        ];
    }
}
