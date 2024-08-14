<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHerohome extends ViewRecord
{
    protected static string $resource = HerohomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    } 

    public function getTitle(): string
    {
        return __('View Home Hero');
    }
}
