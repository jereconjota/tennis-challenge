<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Tournament;
use App\Models\TennisMatch;
use App\Models\TennisPlayer;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\matches;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TournamentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_tournaments()
    {
        $response = $this->get('/api/tournaments');
        $response->assertStatus(200);
    }

    public function test_can_show_tournament()
    {
        $tennisPlayers = TennisPlayer::factory()->count(4)->create();
        $tournament = Tournament::factory()->create();

        $response = $this->get('/api/tournaments/' . $tournament->id);
        $response->assertStatus(200);
    }

    public function test_can_show_tournaments_by_date()
    {
        $players = TennisPlayer::factory()->count(4)->create(['gender' => 'male'])->toArray();
        $playerIds = array_column($players, 'id');
        $data = [
            'name' => 'Test Tournament',
            'gender' => 'male',
            'player_ids' => $playerIds,
        ];

        $response = $this->post('/api/tournaments/play-tournament', $data);
        $tournament = Tournament::first();

        $response = $this->get('/api/tournaments/date/' . $tournament->start_date);
        $response->assertStatus(200);
    }

    public function test_can_show_tournaments_by_gender()
    {
        $players = TennisPlayer::factory()->count(4)->create(['gender' => 'male'])->toArray();
        $playerIds = array_column($players, 'id');
        $data = [
            'name' => 'Test Tournament',
            'gender' => 'male',
            'player_ids' => $playerIds,
        ];

        $response = $this->post('/api/tournaments/play-tournament', $data);
        $tournament = Tournament::first();

        $response = $this->get('/api/tournaments/gender/' . $tournament->gender);
        $response->assertStatus(200);
    }

    public function test_can_list_matches_of_a_tournament()
    {
        $tennisPlayers = TennisPlayer::factory()->count(4)->create();
        $tournament = Tournament::factory()->create(['winner_id' => $tennisPlayers[0]->id]);
        $matches = TennisMatch::factory()->count(3)->create(['tournament_id' => $tournament->id, 'player_one_id' => $tennisPlayers[0]->id, 'player_two_id' => $tennisPlayers[1]->id]);

        $response = $this->get('/api/tournaments/' . $tournament->id . '/matches');
        $response->assertStatus(200);
    }

    public function test_can_get_winner_of_a_tournament()
    {
        $tennisPlayer = TennisPlayer::factory()->create();
        $tournament = Tournament::factory()->create(['winner_id' => $tennisPlayer->id]);

        $response = $this->get('/api/tournaments/' . $tournament->id . '/winner');
        $response->assertStatus(200);
    }

    public function test_can_simulate_tournament()
    {
        $players = TennisPlayer::factory()->count(4)->create(['gender' => 'male'])->toArray();
        $playerIds = array_column($players, 'id');
        $data = [
            'name' => 'Test Tournament',
            'gender' => 'male',
            'player_ids' => $playerIds,
        ];

        $response = $this->post('/api/tournaments/play-tournament', $data);
        $response->assertStatus(200);
    }
}
