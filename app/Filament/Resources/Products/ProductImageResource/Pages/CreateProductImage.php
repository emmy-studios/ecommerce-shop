<?php

namespace App\Filament\Resources\Products\ProductImageResource\Pages;

use App\Filament\Resources\Products\ProductImageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductImage extends CreateRecord
{
    protected static string $resource = ProductImageResource::class; 
    
    public function getTitle(): string
    {
        return __('Create Product Image');
    }
}
