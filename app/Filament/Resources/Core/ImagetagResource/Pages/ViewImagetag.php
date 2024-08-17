<?php

namespace App\Filament\Resources\Core\ImagetagResource\Pages;

use App\Filament\Resources\Core\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImagetag extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = ImagetagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('View Image Tag');
    }
}
