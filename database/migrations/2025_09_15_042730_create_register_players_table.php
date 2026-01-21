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
        Schema::create('register_players', function (Blueprint $table) {
            $table->id();
            // Profile photo
            $table->unsignedBigInteger('photo')->nullable();

            // Basic info
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('dob');
            $table->string('role');
            $table->string('jersey_no');

            // Present address
            $table->string('present_village');
            $table->string('present_district');
            $table->string('present_thana');
            $table->string('present_postal_code');

            // Permanent address
            $table->string('permanent_village')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_thana')->nullable();
            $table->string('permanent_postal_code')->nullable();

            // Other details
            $table->string('nationality')->nullable();
            $table->string('religion');
            $table->string('blood_group');
            $table->string('height');
            $table->string('facebook_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_players');
    }
};
