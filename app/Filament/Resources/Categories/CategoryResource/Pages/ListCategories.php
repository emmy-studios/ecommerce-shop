<?php

namespace App\Filament\Resources\Categories\CategoryResource\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Category')),
            Actions\LocaleSwitcher::make(),
        ];
    } 

    public function getTitle(): string
    {
        return __('Categories');
    }
}
