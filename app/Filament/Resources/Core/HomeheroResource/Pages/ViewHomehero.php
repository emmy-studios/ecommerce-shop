<?php

namespace App\Filament\Resources\Core\HomeheroResource\Pages;

use App\Filament\Resources\Core\HomeheroResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHomehero extends ViewRecord
{
    protected static string $resource = HomeheroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
