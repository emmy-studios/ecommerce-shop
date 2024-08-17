<?php

namespace App\Filament\Resources\Products\ColorResource\Pages;

use App\Filament\Resources\Products\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateColor extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ColorResource::class;

    public function getTitle(): string
    {
        return __('Create Color');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
