<?php

namespace App\Filament\Resources\Products\SizeResource\Pages;

use App\Filament\Resources\Products\SizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSizes extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = SizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Size')),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Sizes');
    }
}
