<?php

namespace App\Filament\Resources\Brands\BrandResource\Pages;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    public function getTitle(): string
    {
        return __('Create Brand');
    }
}


