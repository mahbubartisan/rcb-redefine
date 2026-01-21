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
        Schema::create('bowlings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->decimal('overs', 10, 1)->default(0);
            $table->integer('maiden')->default(0);
            $table->integer('runs')->default(0);
            $table->integer('wickets')->default(0);
            $table->decimal('economy', 10, 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bowlings');
    }
};
