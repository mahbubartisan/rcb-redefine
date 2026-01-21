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
        Schema::table('matches', function (Blueprint $table) {
            $table->string('toss')->nullable()->after('date_time');
            $table->unsignedBigInteger('player_of_match')->nullable()->after('toss');
            $table->string('match_result')->nullable()->after('player_of_match');
            $table->boolean('type')->default(0)->after('match_result');
            $table->unsignedBigInteger('won')->nullable()->after('type');
            $table->string('team1_score')->nullable()->after('won');
            $table->string('team2_score')->nullable()->after('team1_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            //
        });
    }
};
