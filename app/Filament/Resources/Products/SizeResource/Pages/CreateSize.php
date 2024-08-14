<?php

namespace App\Filament\Resources\Products\SizeResource\Pages;

use App\Filament\Resources\Products\SizeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSize extends CreateRecord
{
    protected static string $resource = SizeResource::class;

    public function getTitle(): string
    {
        return __('Create Size');
    }
}
 