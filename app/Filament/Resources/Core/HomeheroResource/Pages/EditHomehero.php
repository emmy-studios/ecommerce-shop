<?php

namespace App\Filament\Resources\Core\HomeheroResource\Pages;

use App\Filament\Resources\Core\HomeheroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomehero extends EditRecord
{
    protected static string $resource = HomeheroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
