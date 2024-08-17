<?php

namespace App\Filament\Resources\Products\ColorResource\Pages;

use App\Filament\Resources\Products\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColors extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Color')),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Colors');
    }
} 
