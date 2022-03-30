<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($max_nb_chars = 20),
            'typenumber' => $this->faker->ean8(),
            'working'  => $this->faker->numberBetween($min = 0, $max = 1),

        ];
    }
}
