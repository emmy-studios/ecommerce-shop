<?php

namespace App\Filament\Resources\Discounts\DiscountResource\Pages;

use App\Filament\Resources\Discounts\DiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDiscount extends ViewRecord
{

    use ViewRecord\Concerns\Translatable;

    protected static string $resource = DiscountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(), 
            Actions\LocaleSwitcher::make(),
        ];
    }
    
    public function getTitle(): string
    {
        return __('View Discount');
    }
}
