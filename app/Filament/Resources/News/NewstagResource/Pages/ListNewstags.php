<?php

namespace App\Filament\Resources\News\NewstagResource\Pages;

use App\Filament\Resources\News\NewstagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewstags extends ListRecords
{
    protected static string $resource = NewstagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Tag')),
        ];
    }

    public function getTitle(): string 
    {
        return __('View Tag');
    } 
}
