<?php

namespace App\Filament\Resources\Core\HomesliderResource\Pages;

use App\Filament\Resources\Core\HomesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHomeslider extends ViewRecord
{
    protected static string $resource = HomesliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
