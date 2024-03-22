<?php

namespace Database\Factories;

use App\Models\TennisMatch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TennisMatches>
 */
class TennisMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TennisMatch::class;

    public function definition(): array
    {
        $player_one = $this->faker->numberBetween(1, 4);
        $player_two = $this->faker->numberBetween(1, 4);

        return [
            'player_one_id' => $player_one,
            'player_two_id' => $player_two,
            'sets' => '{}',
            'winner_id' => $player_two,
            'loser_id' => $player_one,
            'start_time' => $this->faker->dateTime(),
            'end_time' => $this->faker->dateTime(),
            'tournament_id' => $this->faker->numberBetween(1, 100),
            
        ];
    }
}
