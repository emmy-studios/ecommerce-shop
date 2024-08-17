<?php

namespace App\Filament\Resources\Discounts\DiscountResource\Pages;

use App\Filament\Resources\Discounts\DiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscounts extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = DiscountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Discount')),
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getTitle(): string
    {
        return __('Discounts');
    }
}
