<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\SizeResource\Pages;
use App\Filament\Resources\Products\SizeResource\RelationManagers;
use App\Models\Products\Size;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SizeResource extends Resource
{
    protected static ?string $model = Size::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product_size')
                    ->label(__('Product Size'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('note')
                    ->label(__('Note'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_size')
                    ->label(__('Product Size'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('note')
                    ->label(__('Note')),
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
            'index' => Pages\ListSizes::route('/'),
            'create' => Pages\CreateSize::route('/create'),
            'view' => Pages\ViewSize::route('/{record}'),
            'edit' => Pages\EditSize::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Sizes');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Products');
    }
}
