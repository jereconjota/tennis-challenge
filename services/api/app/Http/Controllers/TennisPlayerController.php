<?php

namespace App\Http\Controllers;

use Error;
use App\Models\TennisPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateTennisPlayerRequest;
use App\Http\Requests\UpdateTennisPlayerRequest;

class TennisPlayerController extends Controller
{
    /**
     * Send a JSON response with all tennis players.
     */
    public function index()
    {
        try {
            $tennisPlayers = TennisPlayer::all();
            return response()->json($tennisPlayers);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while retrieving tennis players',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Return specific tennis player by ID.
     */
    public function show($id)
    {
        try {
            $tennisPlayer = TennisPlayer::find($id);
            if (!$tennisPlayer) {
                return response()->json([
                    'message' => 'Tennis player not found'
                ], 404);
            }
            return response()->json($tennisPlayer);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while retrieving tennis player',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a new tennis player in the database.
     */
    public function store(CreateTennisPlayerRequest $request)
    {
        try {
            Log::info('Request data: ' . json_encode($request->all()));

            $tennisPlayer = TennisPlayer::create($request->all());
            return response()->json($tennisPlayer, 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while creating tennis player',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTennisPlayerRequest $request, TennisPlayer $tennisPlayer)
    {
        try {
            $tennisPlayer->update($request->all());
            return response()->json($tennisPlayer);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while updating tennis player',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TennisPlayer $tennisPlayer)
    {
        try {
            $tennisPlayer->delete();
            return response()->json(null, 204);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while deleting tennis player',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
