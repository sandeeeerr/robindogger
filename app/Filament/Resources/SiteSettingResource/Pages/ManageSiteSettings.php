<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Resources\Pages\ManageRecords;
use App\Models\SiteSetting;
use Filament\Actions\Action;

class ManageSiteSettings extends ManageRecords
{
    protected static string $resource = SiteSettingResource::class;

    protected function getHeaderActions(): array
    {
        $record = SiteSetting::query()->first();

        return [
            Action::make('editSettings')
                ->label('Edit Settings')
                ->icon('heroicon-m-pencil')
                ->url($record ? SiteSettingResource::getUrl('edit', ['record' => $record]) : null)
                ->visible(fn () => (bool) $record),
        ];
    }
}


