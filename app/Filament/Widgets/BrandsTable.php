<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class BrandsTable extends BaseWidget
{
    protected int | string |array $columnSpan = "full";

    public function table(Table $table): Table
    {
        return $table
            ->query(BrandResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Brand Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('logo_url'),
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
