<?php

namespace App\Filament\Resources\Reviews\ReviewResource\Pages;

use App\Filament\Resources\Reviews\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReview extends ViewRecord
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    } 

    public function getTitle(): string 
    {
        return __('View Review');
    } 
}
