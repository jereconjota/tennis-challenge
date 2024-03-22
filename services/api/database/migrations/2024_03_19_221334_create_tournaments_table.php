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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('brackets')->nullable();
            $table->string('gender');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->bigInteger('winner_id')->unsigned()->nullable();
            $table->foreign('winner_id')->references('id')->on('tennis_players');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
