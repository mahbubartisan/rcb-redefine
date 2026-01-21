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
        Schema::create('battings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id'); 
            $table->integer('runs')->default(0);
            $table->integer('balls')->default(0);
            $table->integer('fours')->default(0);
            $table->integer('sixes')->default(0);
            $table->string('dismissal')->nullable();
            $table->unsignedBigInteger('fielder_id');
            $table->unsignedBigInteger('bowler_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battings');
    }
};
