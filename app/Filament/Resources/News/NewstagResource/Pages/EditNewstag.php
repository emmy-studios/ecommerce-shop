<?php

namespace App\Filament\Resources\News\NewstagResource\Pages;

use App\Filament\Resources\News\NewstagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewstag extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = NewstagResource::class;

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
        return __('Edit Tag');
    } 
}
