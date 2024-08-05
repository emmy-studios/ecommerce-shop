<?php

namespace App\Filament\Resources\Core\ImagetagResource\Pages;

use App\Filament\Resources\Core\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImagetags extends ListRecords
{
    protected static string $resource = ImagetagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
