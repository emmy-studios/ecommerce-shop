<?php

namespace App\Filament\Resources\Core\HerohomeResource\Pages;

use App\Filament\Resources\Core\HerohomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHerohome extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = HerohomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    } 

    public function getTitle(): string
    {
        return __('View Home Hero');
    }
}
