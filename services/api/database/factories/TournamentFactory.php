<?php

namespace Database\Factories;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Tournament::class;

    public function definition(): array
    {
        return [
            'name' => 'Wimbledon',
            'start_date' => '2021-06-28 08:00:00',
            'end_date' => '2021-07-11 21:00:00',
            'brackets' => '{}',
            'gender' => 'male',
            'winner_id' => 2,
        ];
    }
}
