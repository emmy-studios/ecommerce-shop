<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHerohomes extends ListRecords
{
    protected static string $resource = HerohomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Hero')),
        ];
    }

    public function getTitle(): string
    {
        return __('View Home Hero');
    }
}
