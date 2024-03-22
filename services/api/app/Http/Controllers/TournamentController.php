<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\TennisMatch;
use App\Models\TennisPlayer;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class TournamentController extends Controller
{
    public function index()
    {
        try {
            $tournaments = Tournament::all();
            return response()->json($tournaments, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving tournaments', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Tournament $tournament)
    {
        try {
            return response()->json($tournament, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving tournament', 'error' => $e->getMessage()], 500);
        }
    }

    public function showByDate($date)
    {
        try {
            $tournaments = Tournament::where('start_date', $date)->get();
            return response()->json($tournaments, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving tournaments', 'error' => $e->getMessage()], 500);
        }
    }

    public function showByGender($gender)
    {
        try {
            $tournaments = Tournament::where('gender', $gender)->get();
            return response()->json($tournaments, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving tournaments', 'error' => $e->getMessage()], 500);
        }
    }


    public function matches(Tournament $tournament)
    {
        try {
            $matches = $tournament->matches;
            return response()->json($matches, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving matches', 'error' => $e->getMessage()], 500);
        }
    }

    public function winner(Tournament $tournament)
    {
        try {
            $winner = $tournament->winner;
            return response()->json($winner, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error retrieving winner', 'error' => $e->getMessage()], 500);
        }
    }

    public function playTournament(Request $request)
    {
        try {
            $length = count($request->player_ids);

            /* early validation */
            if ($length === 0) {
                return response()->json(['message' => 'Error playing tournament', 'error' => 'No players provided'], 400);
            }

            if (($length & ($length - 1)) !== 0 ){
                return response()->json(['message' => 'Error playing tournament', 'error' => 'Number of players must be a power of 2'], 400);
            }

            $players = TennisPlayer::whereIn('id', $request->player_ids)->get()->toArray();
            if (count($players) !== $length) {
                return response()->json(['message' => 'Error playing tournament', 'error' => 'Some players do not exist'], 400);
            }

            $gender = array_filter($players, function($player) use ($request) {
                return $player['gender'] === $request->gender;
            });

            if (count($gender) !== $length) {
                return response()->json(['message' => 'Error playing tournament', 'error' => 'The gender of the players does not match the tournament'], 400);
            }

            /* create the tournament */
            $tournament = Tournament::create([
                'name' => $request->name ?? 'Tournament ' . now(),
                'start_date' => now(),
                'gender' => $request->gender,
            ]);

            $activePlayers = $players;

            /** Simulate the tournament */
            $brackets = [];
            while (count($activePlayers) > 1) {
                Log::info($activePlayers);
                $round = [];
                for ($i = 0; $i < count($activePlayers); $i += 2) {
                    Log::info($activePlayers[$i]);
                    Log::info($activePlayers[$i + 1]);
                    // simulate and create the match
                    $match = TennisMatch::create([
                        'player_one_id' => $activePlayers[$i]['id'],
                        'player_two_id' => $activePlayers[$i + 1]['id'],
                        'tournament_id' => $tournament->id,
                        'start_time' => now(),
                    ]);
    
                    // simulate the match
                    $match->simulate($activePlayers[$i], $activePlayers[$i + 1], $request->gender);
    
                    $round[] = [
                        'player1' => $activePlayers[$i]['id'],
                        'player2' => $activePlayers[$i + 1]['id'],
                        'winner' => $match->winner_id,
                        'match_id' => $match->id,
                    ];
                }

                $brackets[] = $round;
                $activePlayers = TennisPlayer::whereIn('id', array_column($round, 'winner'))->get()->toArray();
            }


            $tournament->brackets = $brackets;
            $tournament->end_date = now();
            $tournament->winner_id = $activePlayers[0]['id'];
            $tournament->save();

            return response()->json($tournament, 200);

        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error playing tournament', 'error' => $e->getMessage()], 500);
        }
    }

}
