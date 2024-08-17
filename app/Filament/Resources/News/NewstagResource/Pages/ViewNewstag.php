<?php

namespace App\Filament\Resources\News\NewstagResource\Pages;

use App\Filament\Resources\News\NewstagResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNewstag extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = NewstagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string 
    {
        return __('View Tag');
    } 
} 
