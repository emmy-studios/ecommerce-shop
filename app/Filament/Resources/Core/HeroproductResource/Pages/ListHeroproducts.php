<?php

namespace App\Filament\Resources\Core\HeroproductResource\Pages;

use App\Filament\Resources\Core\HeroproductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroproducts extends ListRecords
{
    protected static string $resource = HeroproductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Hero')),
        ];
    }

    public function getTitle(): string
    {
        return __('View Product Hero');
    }
}
