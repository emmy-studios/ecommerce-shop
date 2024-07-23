<?php

namespace App\Filament\Resources\Core\HeroproductResource\Pages;

use App\Filament\Resources\Core\HeroproductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroproduct extends EditRecord
{
    protected static string $resource = HeroproductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
