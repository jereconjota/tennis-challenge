<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TennisMatchController;
use App\Http\Controllers\TennisPlayerController;

Route::resource('tennis-players', TennisPlayerController::class);

Route::get('tennis-matches', [TennisMatchController::class, 'index']);
Route::get('tennis-matches/{tennis_match}', [TennisMatchController::class, 'show']);

Route::get('tournaments', [TournamentController::class, 'index']);
Route::get('tournaments/{tournament}', [TournamentController::class, 'show']);
Route::get('tournaments/date/{tournament_date}', [TournamentController::class, 'showByDate']);
Route::get('tournaments/gender/{tournament_gender}', [TournamentController::class, 'showByGender']);

Route::get('tournaments/{tournament}/matches', [TournamentController::class, 'matches']);
Route::get('tournaments/{tournament}/winner', [TournamentController::class, 'winner']);
Route::get('tournaments/{tournament}/players', [TournamentController::class, 'players']);

Route::post('tournaments/play-tournament', [TournamentController::class, 'playTournament']);