<?php

namespace App\Filament\Resources\Products\SizeResource\Pages;

use App\Filament\Resources\Products\SizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSize extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = SizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string 
    {
        return __('View Size');
    } 
} 
