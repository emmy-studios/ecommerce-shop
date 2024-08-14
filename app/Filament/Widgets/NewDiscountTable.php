<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Discounts\DiscountResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewDiscountTable extends BaseWidget
{
    protected int | string |array $columnSpan = "full";

    protected function getTableHeading(): string
    {
        return __('New Discounts Table'); 
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(DiscountResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('discount_code')
                    ->label(__('Discount Code'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_at')
                    ->label(__('Start at'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->label(__('Ends at'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->label(__('Discount Percentage'))
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label(__('Image')),
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
