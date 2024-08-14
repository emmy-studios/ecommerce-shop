<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Brands\BrandResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class BrandsTable extends BaseWidget
{
    protected int | string |array $columnSpan = "full";

    protected function getTableHeading(): string
    {
        return __('New Brands Table'); 
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(BrandResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Brand Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('logo_url')
                    ->label(__('Logo Url')),
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
