<?php

namespace Database\Seeders;

use App\Models\TennisMatch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TennisMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tennisMatches = [
            [
                'player_one_id' => 1,
                'player_two_id' => 2,
                'sets' => '{ "set1": [6, 4], "set2": [6, 3] }',
                'winner_id' => 1,
                'loser_id' => 2,
                'start_time' => '2021-01-01 10:00:00',
                'end_time' => '2021-01-01 11:00:00',
                'tournament_id' => 1,
            ],
            [
                'player_one_id' => 3,
                'player_two_id' => 4,
                'sets' => '{ "set1": [6, 4], "set2": [6, 3] }',
                'winner_id' => 3,
                'loser_id' => 4,
                'start_time' => '2021-01-01 11:00:00',
                'end_time' => '2021-01-01 12:00:00',
                'tournament_id' => 1,
            ],
            [
                'player_one_id' => 1,
                'player_two_id' => 3,
                'sets' => '{ "set1": [6, 4], "set2": [6, 3] }',
                'winner_id' => 1,
                'loser_id' => 3,
                'start_time' => '2021-01-01 12:00:00',
                'end_time' => '2021-01-01 13:00:00',
                'tournament_id' => 1,
            ],
            [
                'player_one_id' => 2,
                'player_two_id' => 4,
                'sets' => '{ "set1": [6, 4], "set2": [6, 3] }',
                'winner_id' => 2,
                'loser_id' => 4,
                'start_time' => '2021-01-01 13:00:00',
                'end_time' => '2021-01-01 14:00:00',
                'tournament_id' => 1,
            ]
        ];

        foreach ($tennisMatches as $match) {
            TennisMatch::create($match);
        }

    }
}
