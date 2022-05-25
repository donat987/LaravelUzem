<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sensor;
use App\Models\Company;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'scandata'  => $this->faker->numberBetween($min = 200, $max = 250),
            'sensor_id'  => Sensor::inRandomOrder()->first()->id,
            'company_id'  => Company::inRandomOrder()->first()->id,
            'created_at'  =>  $this->faker->dateTimeThisDecade($max = 'now', $timezone = null),

        ];
    }
}
