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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            // Name
            $table->string('first_name_en')->nullable();
            $table->string('first_name_bn')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('last_name_bn')->nullable();

            // Media
            $table->unsignedBigInteger('role_icon')->nullable();
            $table->unsignedBigInteger('photo')->nullable();

            // Address
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('thana_id')->nullable();
            $table->string('post_office')->nullable();
            $table->string('village')->nullable();

            // Personal Info
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality_en')->nullable();
            $table->string('nationality_bn')->nullable();

            // Cricket Info
            $table->string('playing_role')->nullable();
            $table->string('batting_style')->nullable();
            $table->string('bowling_style')->nullable();
            $table->string('debut')->nullable();
            $table->string('player_tag')->nullable();

            // Description
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
