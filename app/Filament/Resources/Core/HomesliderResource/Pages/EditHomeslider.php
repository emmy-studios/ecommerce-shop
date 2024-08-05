<?php

namespace App\Filament\Resources\Core\HomesliderResource\Pages;

use App\Filament\Resources\Core\HomesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeslider extends EditRecord
{
    protected static string $resource = HomesliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
