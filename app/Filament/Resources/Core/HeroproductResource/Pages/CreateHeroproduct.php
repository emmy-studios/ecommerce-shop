<?php

namespace App\Filament\Resources\Core\HeroproductResource\Pages;

use App\Filament\Resources\Core\HeroproductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroproduct extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HeroproductResource::class;

    public function getTitle(): string
    {
        return __('Create Product Hero');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
