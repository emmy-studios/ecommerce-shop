<?php

namespace App\Filament\Resources\Core\HeroproductResource\Pages;

use App\Filament\Resources\Core\HeroproductResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroproduct extends ViewRecord
{
    protected static string $resource = HeroproductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
