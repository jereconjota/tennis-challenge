<?php

namespace App\Models;

use Illuminate\Log\Logger;
use App\Models\TennisMatch;
use App\Models\TennisPlayer;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    public function matches()
    {
        return $this->hasMany(TennisMatch::class);
    }

    public function winner()
    {
        return $this->belongsTo(TennisPlayer::class, 'winner_id');
    }

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'gender',
        'brackets',
        'winner_id',
    ];

    // function to play the tournament, recieve an array of player_ids, create matches and save them, play the matches and return the winner

    public function play($player_ids)
    {
        Log::debug('Playing tournament with players: ' . json_encode($player_ids));
        return 'ok';
    }

}
