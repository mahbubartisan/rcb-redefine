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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->unsignedBigInteger('team1_id')->nullable();
            $table->unsignedBigInteger('team2_id')->nullable();
            $table->string('name')->index();
            $table->string('venue');
            $table->string('date_time');
            $table->string('toss')->nullable();
            $table->unsignedBigInteger('player_of_match')->nullable();
            $table->string('match_result')->nullable();
            $table->boolean('type')->default(0)->nullable();
            $table->unsignedBigInteger('won')->nullable();
            $table->string('team1_score')->nullable();
            $table->decimal('team1_played_over', 10, 1)->nullable();
            $table->string('team1_score')->nullable();
            $table->decimal('team2_played_over', 10, 1)->nullable();
            $table->text('match_info')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
