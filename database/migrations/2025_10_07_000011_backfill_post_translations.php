<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('posts')->orderBy('id')->lazyById()->each(function ($post) {
            $title = $post->title ?? '';
            $description = $post->description ?? '';

            DB::table('posts')
                ->where('id', $post->id)
                ->update([
                    'title_translations' => json_encode(['nl' => $title, 'en' => $title]),
                    'description_translations' => json_encode(['nl' => $description, 'en' => $description]),
                ]);
        });
    }

    public function down(): void
    {
        // No-op: keep translated values
    }
};


