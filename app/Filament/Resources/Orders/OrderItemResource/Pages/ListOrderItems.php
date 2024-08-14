<?php

namespace App\Filament\Resources\Orders\OrderItemResource\Pages;

use App\Filament\Resources\Orders\OrderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('Create Item')),
        ];
    }

    public function getTitle(): string
    {
        return __('View Order Items');
    }
}
