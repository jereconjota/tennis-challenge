<?php

namespace App\Models;

use App\Models\Tournament;
use App\Models\TennisPlayer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TennisMatch extends Model
{
    use HasFactory;

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function player_one_id()
    {
        return $this->belongsTo(TennisPlayer::class, 'player_one_id');
    }

    public function player_two_id()
    {
        return $this->belongsTo(TennisPlayer::class, 'player_two_id');
    }

    protected $fillable = [
        'player_one_id',
        'player_two_id',
        'sets',
        'winner_id',
        'loser_id',
        'start_time',
        'end_time',
        'tournament_id',
    ];

    public function simulate($player_one, $player_two, $gender)
    {
        $this->start_time = now();
        $sets = [];
        $player_one_score = 0;
        $player_two_score = 0;

        for ($set = 1; $set <= 3; $set++) {
            $player_one_points = 0;
            $player_two_points = 0;

            // Simulate points until a player reaches 6 points and has at least 2 points of difference
            while (abs($player_one_points - $player_two_points) < 2 || max($player_one_points, $player_two_points) < 6) {
                // Calculate the probability of each player winning a point
                $player_one_prob = ($player_one['hability'] + $player_one['strength'] + $player_one['sprintSpeed']) / 300;
                $player_two_prob = ($player_two['hability'] + $player_two['strength'] + $player_two['sprintSpeed']) / 300;

                // Simulate a point and update the score
                if (rand(0, 100) / 100 < $player_one_prob) {
                    $player_one_points++;
                } else {
                    $player_two_points++;
                }
            }

            // Check who won the set and update the total scores
            if ($player_one_points > $player_two_points) {
                $player_one_score++;
            } else {
                $player_two_score++;
            }

            // Register the set result
            $sets[] = [$player_one_points, $player_two_points];

            // Check if one of the players won two sets
            if ($player_one_score >= 2 || $player_two_score >= 2) {
                break;
            }
        }

        $this->sets = $sets;
        
        if ($player_one_score > $player_two_score) {
            $this->winner_id = $player_one['id'];
            $this->loser_id = $player_two['id'];
        } else {
            $this->winner_id = $player_two['id'];
            $this->loser_id = $player_one['id'];
        }
        $this->end_time = now();
        $this->save();
    }
}
