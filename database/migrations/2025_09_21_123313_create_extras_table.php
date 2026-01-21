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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedInteger('byes')->default(0);
            $table->unsignedInteger('leg_byes')->default(0);
            $table->unsignedInteger('wides')->default(0);
            $table->unsignedInteger('no_balls')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extras');
    }
};
