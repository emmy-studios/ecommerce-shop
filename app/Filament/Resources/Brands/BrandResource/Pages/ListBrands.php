<?php

namespace App\Filament\Resources\Brands\BrandResource\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Brand')),
        ];
    }
    public function getTitle(): string
    {
        return __('Brands');
    }
    
}
 