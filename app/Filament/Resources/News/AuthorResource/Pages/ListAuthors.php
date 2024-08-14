<?php

namespace App\Filament\Resources\News\AuthorResource\Pages;

use App\Filament\Resources\News\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Author')),
        ];
    }

    public function getTitle(): string 
    {
        return __('Authors');
    } 
}
