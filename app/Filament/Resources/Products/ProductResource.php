<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\ProductResource\Pages;
use App\Filament\Resources\Products\ProductResource\RelationManagers;
use App\Filament\Resources\Products\ProductResource\RelationManagers\CategoriesRelationManager;
use App\Models\Products\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null; 

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Product Title'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->label(__('Description'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('unit_price')
                    ->label(__('Unit Price'))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stock_quantity')
                    ->label(__('Stock Quantity'))
                    ->numeric(),
                Forms\Components\TextInput::make('selling_quantity')
                    ->label(__('Selling Quantity'))
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('emergency_quantity')
                    ->label(__('Emergency Quantity'))
                    ->numeric(),
                Forms\Components\TextInput::make('total_quantity')
                    ->label(__('Total Quantity'))
                    ->numeric(),
                Forms\Components\Select::make('brand_id')
                    ->label(__('Brand'))
                    ->relationship('brand', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Product Title'))
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
                    ->label(__('Brand'))
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Products');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Products');
    }
}
