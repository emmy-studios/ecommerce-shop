<?php

namespace App\Filament\Resources\News\NewstagResource\Pages;

use App\Filament\Resources\News\NewstagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewstag extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = NewstagResource::class;

    public function getTitle(): string 
    {
        return __('Create Tag');
    } 

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
