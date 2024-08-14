<?php

namespace App\Filament\Resources\News\NewsResource\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNews extends ListRecords
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create News')),
        ];
    }

    public function getTitle(): string 
    {
        return __('View News');
    } 
}
