<?php

namespace App\Filament\Resources\Categories\CategoryResource\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = CategoryResource::class;

    public function getTitle(): string
    {
        return __('Create Category');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
