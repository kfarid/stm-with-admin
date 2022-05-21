<?php

namespace Database\Factories;

use App\Models\ThirdPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'img' => $this->faker->imageUrl(300, 100),
            'title' => $this->faker->jobTitle(),
            'location' => $this->faker->locale(),
            'phone' => $this->faker->e164PhoneNumber(),
            'fax' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->email(),
            'link' => $this->faker->url(),
            'third_id' => ThirdPage::factory()->create(),
            'created_at' => now(),
        ];
    }
}
