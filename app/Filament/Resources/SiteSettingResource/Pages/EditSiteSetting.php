<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\SiteSetting;

class EditSiteSetting extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    public function mount($record = null): void
    {
        // Force load the singleton record and redirect to its edit form pathless
        $record = $record ?: optional(SiteSetting::query()->first())->getKey();
        if (! $record) {
            // In case the seed didn't run yet, create one
            $record = SiteSetting::query()->create()->getKey();
        }

        parent::mount($record);
    }
}


