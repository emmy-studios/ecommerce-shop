<?php

namespace App\Filament\Resources\Orders\OrderResource\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Order')),
        ];
    }

    public function getTitle(): string
    {
        return __('View Order');
    }
}
