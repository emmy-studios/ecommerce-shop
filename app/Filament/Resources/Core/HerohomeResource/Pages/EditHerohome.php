<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHerohome extends EditRecord
{
    protected static string $resource = HerohomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Home Hero');
    }
}
