<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_settings')->orderBy('id')->lazyById()->each(function ($row) {
            $homeHeader = $row->home_header ?? '';
            $aboutText = $row->about_text ?? '';
            $tagline = $row->header_tagline ?? '';
            $desc = $row->description ?? '';

            $updates = [];

            // Only backfill if the translations columns are empty/null
            if (is_null($row->home_header_translations)) {
                $updates['home_header_translations'] = json_encode(['nl' => $homeHeader, 'en' => $homeHeader]);
            }

            if (is_null($row->about_text_translations)) {
                $updates['about_text_translations'] = json_encode(['nl' => $aboutText, 'en' => $aboutText]);
            }

            if (property_exists($row, 'header_tagline_translations')) {
                if (is_null($row->header_tagline_translations)) {
                    $updates['header_tagline_translations'] = json_encode(['nl' => $tagline, 'en' => $tagline]);
                }
            } else {
                // Some DB drivers return objects without dynamic properties; attempt update anyway
                $updates['header_tagline_translations'] = json_encode(['nl' => $tagline, 'en' => $tagline]);
            }

            if (property_exists($row, 'description_translations') && is_null($row->description_translations)) {
                $updates['description_translations'] = json_encode(['nl' => $desc, 'en' => $desc]);
            }

            if (! empty($updates)) {
                DB::table('site_settings')->where('id', $row->id)->update($updates);
            }
        });
    }

    public function down(): void
    {
        // No rollback for backfill
    }
};


