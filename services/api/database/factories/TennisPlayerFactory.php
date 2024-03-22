<?php

namespace Database\Factories;

use App\Models\TennisPlayer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TennisPlayer>
 */
class TennisPlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TennisPlayer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'hability' => $this->faker->numberBetween(1, 100),
            'strength' => $this->faker->numberBetween(1, 100),
            'sprintSpeed' => $this->faker->numberBetween(1, 100),
            'agility' => $this->faker->numberBetween(1, 100),
        ];
    }
}
