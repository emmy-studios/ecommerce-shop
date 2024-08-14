<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Exports\Orders\OrderExporter;
use App\Filament\Resources\Orders\OrderResource\Pages;
use App\Filament\Resources\Orders\OrderResource\RelationManagers;
use App\Models\Orders\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label(__('Username'))
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('order_code')
                    ->label(__('Order Code'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtotal')
                    ->label(__('Subtotal'))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total')
                    ->label(__('Total'))
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->label(__('Status'))
                    ->options([
                        'pending' => 'pending',
                        'completed' => 'completed',
                        'failed' => 'failed',
                        'canceled' => 'canceled',
                        'processing' => 'processing',
                        'delivered' => 'delivered'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Username'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_code')
                    ->label(__('Order Code'))
                    ->searchable(), 
                Tables\Columns\TextColumn::make('subtotal')
                    ->label(__('Subtotal'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->label(__('Total'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->sortable()
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
                ExportAction::make()->exporter(OrderExporter::class)->label(__('Export Order')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()->exporter(OrderExporter::class),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Orders');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Orders');
    }
}
