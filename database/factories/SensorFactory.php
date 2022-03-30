<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Machine;
use App\Models\Datatype;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'machine_id' => Machine::inRandomOrder()->first()->id,
            'datatype_id'  => Datatype::inRandomOrder()->first()->id,
        ];
    }
}
