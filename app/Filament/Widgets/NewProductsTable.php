<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Products\ProductResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewProductsTable extends BaseWidget
{
    protected int | string |array $columnSpan = "full";
    
    public function table(Table $table): Table
    {
        return $table
            ->query(ProductResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selling_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('emergency_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
