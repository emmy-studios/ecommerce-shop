<?php

namespace App\Filament\Resources\Core\HomesliderResource\Pages;

use App\Filament\Resources\Core\HomesliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomesliders extends ListRecords
{
    protected static string $resource = HomesliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
