<?php

namespace App\Filament\Resources\Discounts;

use App\Filament\Resources\Discounts\DiscountResource\Pages;
use App\Filament\Resources\Discounts\DiscountResource\RelationManagers;
use App\Filament\Resources\Discounts\DiscountResource\RelationManagers\ProductsRelationManager;
use App\Models\Discounts\Discount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('discount_code')
                    ->label(__('Discount Code'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('start_at')
                    ->label(__('Start at')),
                Forms\Components\DatePicker::make('ends_at')
                    ->label(__('Ends at')),
                Forms\Components\TextInput::make('discount_percentage')
                    ->label(__('Discount Percentage'))
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('banner_image')
                    ->label(__('Banner Image'))
                    ->disk('public')
                    ->directory('discount-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\MarkdownEditor::make('details')
                    ->label(__('Details'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                    ->label(__('Banner Image')),
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
            ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'view' => Pages\ViewDiscount::route('/{record}'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Discounts');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Discounts');
    }
}
