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
        Schema::create('commentaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->decimal('over_number', 10, 1)->default(0);
            $table->string('score_at')->nullable();
            $table->string('ball_number')->nullable();
            $table->string('ball_per_run')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaries');
    }
};
