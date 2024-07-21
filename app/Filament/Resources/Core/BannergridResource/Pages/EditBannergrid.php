<?php

namespace App\Filament\Resources\Core\BannergridResource\Pages;

use App\Filament\Resources\Core\BannergridResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBannergrid extends EditRecord
{
    protected static string $resource = BannergridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
