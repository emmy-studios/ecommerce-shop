<?php

namespace App\Filament\Resources\Core;

use App\Filament\Resources\Core\HeroproductResource\Pages;
use App\Filament\Resources\Core\HeroproductResource\RelationManagers;
use App\Models\Core\Heroproduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroproductResource extends Resource
{
    protected static ?string $model = Heroproduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->maxLength(255),
                Forms\Components\FileUpload::make('hero_image')
                    ->label(__('Image'))
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('hero_image')
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
            'index' => Pages\ListHeroproducts::route('/'),
            'create' => Pages\CreateHeroproduct::route('/create'),
            'view' => Pages\ViewHeroproduct::route('/{record}'),
            'edit' => Pages\EditHeroproduct::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Products Hero');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Website');
    }
}
