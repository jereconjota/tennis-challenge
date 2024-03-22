<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TennisPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            // Male players
            [
                'name' => 'Roger',
                'lastname' => 'Federer',
                'gender' => 'male',
                'hability' => 95,
                'strength' => 90,
                'sprintSpeed' => 85,
                'agility' => 90,
            ],
            [
                'name' => 'Rafael',
                'lastname' => 'Nadal',
                'gender' => 'male',
                'hability' => 93,
                'strength' => 92,
                'sprintSpeed' => 88,
                'agility' => 91,
            ],
            [
                'name' => 'Novak',
                'lastname' => 'Djokovic',
                'gender' => 'male',
                'hability' => 94,
                'strength' => 91,
                'sprintSpeed' => 90,
                'agility' => 92,
            ],
            [
                'name' => 'Andy',
                'lastname' => 'Murray',
                'gender' => 'male',
                'hability' => 91,
                'strength' => 89,
                'sprintSpeed' => 87,
                'agility' => 88,
            ],
            [
                'name' => 'Stefanos',
                'lastname' => 'Tsitsipas',
                'gender' => 'male',
                'hability' => 90,
                'strength' => 88,
                'sprintSpeed' => 86,
                'agility' => 89,
            ],
            [
                'name' => 'Alexander',
                'lastname' => 'Zverev',
                'gender' => 'male',
                'hability' => 89,
                'strength' => 87,
                'sprintSpeed' => 85,
                'agility' => 88,
            ],
            [
                'name' => 'Dominic',
                'lastname' => 'Thiem',
                'gender' => 'male',
                'hability' => 88,
                'strength' => 86,
                'sprintSpeed' => 84,
                'agility' => 87,
            ],
            [
                'name' => 'Daniil',
                'lastname' => 'Medvedev',
                'gender' => 'male',
                'hability' => 87,
                'strength' => 85,
                'sprintSpeed' => 83,
                'agility' => 86,
            ],
            [
                'name' => 'Matteo',
                'lastname' => 'Berrettini',
                'gender' => 'male',
                'hability' => 86,
                'strength' => 84,
                'sprintSpeed' => 82,
                'agility' => 85,
            ],
            [
                'name' => 'Hubert',
                'lastname' => 'Hurkacz',
                'gender' => 'male',
                'hability' => 85,
                'strength' => 83,
                'sprintSpeed' => 81,
                'agility' => 84,
            ],
        
            // Female players
            [
                'name' => 'Serena',
                'lastname' => 'Williams',
                'gender' => 'female',
                'hability' => 96,
                'strength' => 93,
                'sprintSpeed' => 89,
                'agility' => 92,
            ],
            [
                'name' => 'Simona',
                'lastname' => 'Halep',
                'gender' => 'female',
                'hability' => 94,
                'strength' => 91,
                'sprintSpeed' => 88,
                'agility' => 91,
            ],
            [
                'name' => 'Naomi',
                'lastname' => 'Osaka',
                'gender' => 'female',
                'hability' => 93,
                'strength' => 90,
                'sprintSpeed' => 87,
                'agility' => 90,
            ],
            [
                'name' => 'Ashleigh',
                'lastname' => 'Barty',
                'gender' => 'female',
                'hability' => 92,
                'strength' => 89,
                'sprintSpeed' => 86,
                'agility' => 89,
            ],
            [
                'name' => 'Bianca',
                'lastname' => 'Andreescu',
                'gender' => 'female',
                'hability' => 91,
                'strength' => 88,
                'sprintSpeed' => 85,
                'agility' => 88,
            ],
            [
                'name' => 'Iga',
                'lastname' => 'Swiatek',
                'gender' => 'female',
                'hability' => 90,
                'strength' => 87,
                'sprintSpeed' => 84,
                'agility' => 87,
            ],
            [
                'name' => 'Karolina',
                'lastname' => 'Pliskova',
                'gender' => 'female',
                'hability' => 89,
                'strength' => 86,
                'sprintSpeed' => 83,
                'agility' => 86,
            ],
            [
                'name' => 'Elina',
                'lastname' => 'Svitolina',
                'gender' => 'female',
                'hability' => 88,
                'strength' => 85,
                'sprintSpeed' => 82,
                'agility' => 85,
            ],
            [
                'name' => 'Aryna',
                'lastname' => 'Sabalenka',
                'gender' => 'female',
                'hability' => 87,
                'strength' => 84,
                'sprintSpeed' => 81,
                'agility' => 84,
            ],
            [
                'name' => 'Garbiñe',
                'lastname' => 'Muguruza',
                'gender' => 'female',
                'hability' => 86,
                'strength' => 83,
                'sprintSpeed' => 80,
                'agility' => 83,
            ],
        ];

        foreach ($players as $player) {
            \App\Models\TennisPlayer::create($player);
        }
    }
}
