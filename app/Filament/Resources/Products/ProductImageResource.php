<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\ProductImageResource\Pages;
use App\Filament\Resources\Products\ProductImageResource\RelationManagers;
use App\Models\Products\ProductImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductImageResource extends Resource
{
    protected static ?string $model = ProductImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;
 
    protected static ?int $navigationSort = 2;
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_url')
                    ->label(__('Image Url'))
                    ->disk('public')
                    ->directory('product-images')
                    ->image()
                    ->imageEditor()
                    ->required(),
                Forms\Components\MarkdownEditor::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),
                Forms\Components\Select::make('product_id')
                    ->label(__('Product'))
                    ->relationship('product', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label(__('Image Url')),
                Tables\Columns\TextColumn::make('product.name')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductImages::route('/'),
            'create' => Pages\CreateProductImage::route('/create'),
            'view' => Pages\ViewProductImage::route('/{record}'),
            'edit' => Pages\EditProductImage::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Products Images');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Products');
    }
}
