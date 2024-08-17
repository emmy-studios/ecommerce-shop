<?php

namespace App\Filament\Resources\News\NewsResource\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNews extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string 
    {
        return __('View News');
    } 
}
