<?php

namespace App\Filament\Resources\Discounts\DiscountResource\Pages;

use App\Filament\Resources\Discounts\DiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDiscount extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = DiscountResource::class;

    public function getTitle(): string
    {
        return __('Create Discount');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
 