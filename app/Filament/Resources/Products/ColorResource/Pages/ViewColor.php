<?php

namespace App\Filament\Resources\Products\ColorResource\Pages;

use App\Filament\Resources\Products\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewColor extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = ColorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string 
    {
        return __('View Color');
    }
}
