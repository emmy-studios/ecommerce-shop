<?php

namespace App\Filament\Resources\News\NewsResource\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string 
    {
        return __('Edit News');
    } 
}
