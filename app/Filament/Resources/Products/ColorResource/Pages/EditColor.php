<?php

namespace App\Filament\Resources\Products\ColorResource\Pages;

use App\Filament\Resources\Products\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColor extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Color');
    }
}
