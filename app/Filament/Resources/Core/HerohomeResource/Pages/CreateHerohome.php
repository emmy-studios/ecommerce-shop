<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHerohome extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HerohomeResource::class;

    public function getTitle(): string
    {
        return __('Create Home Hero');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
