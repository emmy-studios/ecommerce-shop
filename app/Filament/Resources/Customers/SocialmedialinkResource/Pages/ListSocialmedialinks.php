<?php

namespace App\Filament\Resources\Customers\SocialmedialinkResource\Pages;

use App\Filament\Resources\Customers\SocialmedialinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialmedialinks extends ListRecords
{
    protected static string $resource = SocialmedialinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Social Media')),
        ];
    }

    public function getTitle(): string
    {
        return __('Social Media Links');
    }
} 
