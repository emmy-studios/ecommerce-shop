<?php

namespace App\Filament\Resources\Core\BannergridResource\Pages;

use App\Filament\Resources\Core\BannergridResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBannergrids extends ListRecords
{
    protected static string $resource = BannergridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
