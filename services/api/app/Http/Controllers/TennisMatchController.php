<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTennisMatchRequest;
use App\Http\Requests\UpdateTennisMatchRequest;
use App\Models\TennisMatch;
use Illuminate\Http\Request;


class TennisMatchController extends Controller
{
    public function index()
    {
        try {
            $tennisMatches = TennisMatch::all();
            return response()->json($tennisMatches, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'An error occurred while retrieving tennis matches.', 'error' => $e->getMessage()], 500);
        }
    }


    public function show(TennisMatch $tennisMatch)
    {
        try {
            return response()->json($tennisMatch, 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'An error occurred while retrieving the tennis match.', 'error' => $e->getMessage()], 500);
        }
    }

}
