<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tennis_matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('player_one_id')->unsigned();
            $table->bigInteger('player_two_id')->unsigned();
            $table->longText('sets')->nullable();
            $table->integer('winner_id')->nullable();
            $table->integer('loser_id')->nullable();
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->bigInteger('tournament_id')->unsigned();

            $table->foreign('player_one_id')->references('id')->on('tennis_players');
            $table->foreign('player_two_id')->references('id')->on('tennis_players');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tennis_matches');
    }
};
