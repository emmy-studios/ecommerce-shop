<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Exports\Orders\OrderItemExporter;
use App\Filament\Resources\Orders\OrderItemResource\Pages;
use App\Filament\Resources\Orders\OrderItemResource\RelationManagers;
use App\Models\Orders\OrderItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('order_id')
                    ->label(__('Order'))
                    ->relationship('order', 'id')
                    ->required(),
                Forms\Components\Select::make('product_id')
                    ->label(__('Product'))
                    ->relationship('product', 'name')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->label(__('Quantity'))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('color')
                    ->label(__('Color'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('size')
                    ->label(__('Size'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.id')
                    ->label(__('Order'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__('Product'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('color')
                    ->label(__('Color'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('size')
                    ->label(__('Size'))
                    ->searchable(),
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()->exporter(OrderItemExporter::class)->label(__('Export Items')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()->exporter(OrderItemExporter::class),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'view' => Pages\ViewOrderItem::route('/{record}'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Orders Items');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Orders');
    }
}
