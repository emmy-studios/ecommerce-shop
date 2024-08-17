<?php

namespace App\Filament\Resources\Core;

use App\Filament\Resources\Core\HerohomeResource\Pages;
use App\Filament\Resources\Core\HerohomeResource\RelationManagers;
use App\Models\Core\Herohome;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HerohomeResource extends Resource
{
    use Translatable;

    protected static ?string $model = Herohome::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->label(__('Subtitle'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('text')
                    ->label(__('Text'))
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image_url')
                    ->label(__('Image'))
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label(__('Subtitle'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label(__('Text'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_url')
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
            'index' => Pages\ListHerohomes::route('/'),
            'create' => Pages\CreateHerohome::route('/create'),
            'view' => Pages\ViewHerohome::route('/{record}'),
            'edit' => Pages\EditHerohome::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Home Hero');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Website');
    }
}
 