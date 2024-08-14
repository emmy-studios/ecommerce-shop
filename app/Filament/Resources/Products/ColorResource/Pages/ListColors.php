<?php

namespace App\Filament\Resources\Products\ColorResource\Pages;

use App\Filament\Resources\Products\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColors extends ListRecords
{
    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Color')),
        ];
    }

    public function getTitle(): string
    {
        return __('Colors');
    }
} 
