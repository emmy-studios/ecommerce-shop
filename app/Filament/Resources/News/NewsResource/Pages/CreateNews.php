<?php

namespace App\Filament\Resources\News\NewsResource\Pages;

use App\Filament\Resources\News\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = NewsResource::class;

    public function getTitle(): string 
    {
        return __('Create News');
    } 

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}

