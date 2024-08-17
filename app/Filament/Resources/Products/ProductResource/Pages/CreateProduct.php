<?php

namespace App\Filament\Resources\Products\ProductResource\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ProductResource::class; 

    public function getTitle(): string
    {
        return __('Create Product');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
 