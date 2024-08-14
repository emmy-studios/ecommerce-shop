<?php

namespace App\Filament\Resources\Products\ProductImageResource\Pages;

use App\Filament\Resources\Products\ProductImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductImage extends EditRecord
{
    protected static string $resource = ProductImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(), 
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Product Image');
    }
}
