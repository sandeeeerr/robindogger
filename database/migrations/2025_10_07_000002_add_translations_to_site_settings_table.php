<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->json('description_translations')->nullable()->after('description');
            $table->json('home_header_translations')->nullable()->after('home_header');
            $table->json('about_text_translations')->nullable()->after('about_text');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['description_translations', 'home_header_translations', 'about_text_translations']);
        });
    }
};


