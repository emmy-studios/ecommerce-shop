<?php

namespace App\Filament\Resources\Products\ProductResource\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Product')),
            Actions\LocaleSwitcher::make(),
        ];
    }
 
    public function getTitle(): string
    {
        return __('Products');
    }
} 
