<?php

namespace App\Filament\Resources\Categories\CategoryResource\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategory extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make()
        ];
    }

    public function getTitle(): string
    {
        return __('View Category');
    }
}
