<?php

namespace App\Filament\Resources\Core\BannergridResource\Pages;

use App\Filament\Resources\Core\BannergridResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBannergrid extends ViewRecord
{
    protected static string $resource = BannergridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
