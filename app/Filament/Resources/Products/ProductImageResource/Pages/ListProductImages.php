<?php

namespace App\Filament\Resources\Products\ProductImageResource\Pages;

use App\Filament\Resources\Products\ProductImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductImages extends ListRecords
{
    protected static string $resource = ProductImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Product Image')),
        ];
    }

    public function getTitle(): string
    {
        return __('Products Images');
    }
}
