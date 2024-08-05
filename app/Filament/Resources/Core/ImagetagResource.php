<?php

namespace App\Filament\Resources\Core;

use App\Filament\Resources\Core\ImagetagResource\Pages;
use App\Filament\Resources\Core\ImagetagResource\RelationManagers;
use App\Models\Core\Imagetag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImagetagResource extends Resource
{
    protected static ?string $model = Imagetag::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Image Tags';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Forms\Components\FileUpload::make('image_url')
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\TextInput::make('text')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url'),
                Tables\Columns\TextColumn::make('text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListImagetags::route('/'),
            'create' => Pages\CreateImagetag::route('/create'),
            'view' => Pages\ViewImagetag::route('/{record}'),
            'edit' => Pages\EditImagetag::route('/{record}/edit'),
        ];
    }
}
