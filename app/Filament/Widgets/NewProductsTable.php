<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Products\ProductResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewProductsTable extends BaseWidget
{
    protected int | string |array $columnSpan = "full";

    protected function getTableHeading(): string
    {
        return __('New Products Table'); 
    }
    
    public function table(Table $table): Table
    {
        return $table
            ->query(ProductResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->label(__('Unit Price'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label(__('Stock Quantity'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selling_quantity')
                    ->label(__('Selling Quantity'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('emergency_quantity')
                    ->label(__('Emergency Quantity'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_quantity')
                    ->label(__('Total Quantity'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label(__('Brand Name'))
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
