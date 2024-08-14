<?php

namespace App\Filament\Resources\Core\BannerResource\Pages;

use App\Filament\Resources\Core\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBanner extends ViewRecord
{
    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('View Banner');
    }
}
 