<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Verwijder het oude `content`-veld
            $table->dropColumn('content');

            // Voeg een nieuw `description`-veld toe
            $table->text('description')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Verwijder het `description`-veld
            $table->dropColumn('description');

            // Voeg het oude `content`-veld terug
            $table->json('content')->nullable()->after('slug');
        });
    }
};