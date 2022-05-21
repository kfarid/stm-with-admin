<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Panel>
 */
class PanelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->name(),
            'name_az' => $this->faker->name(),
            'name_ru' => $this->faker->name(),
            'name_tr' => $this->faker->name(),
            'text_en' => $this->faker->realText(600),
            'text_az' => $this->faker->realText(600),
            'text_ru' => $this->faker->realText(600),
            'text_tr' => $this->faker->realText(600),
        ];
    }
}
