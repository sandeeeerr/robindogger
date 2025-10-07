<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->json('experience')->nullable();
            $table->json('socials')->nullable();
            $table->timestamps();
        });

        // Seed a single row to act as singleton
        \DB::table('site_settings')->insert([
            'email' => 'robindogger@gmail.com',
            'description' => null,
            'experience' => json_encode(['BW H ontwerpers (intern)', 'Freelance Work']),
            'socials' => json_encode(['instagram' => '#', 'linkedin' => '#']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};


