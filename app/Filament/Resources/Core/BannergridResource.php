<?php

namespace App\Filament\Resources\Core;

use App\Filament\Resources\Core\BannergridResource\Pages;
use App\Filament\Resources\Core\BannergridResource\RelationManagers;
use App\Models\Core\Bannergrid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannergridResource extends Resource
{
    protected static ?string $model = Bannergrid::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Banner Grid';

    protected static ?string $navigationGroup = 'Banners';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner_image')
                    ->disk('public')
                    ->directory('core-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\TextInput::make('first_text') 
                    ->maxLength(255),
                Forms\Components\TextInput::make('second_text')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_image'),
                Tables\Columns\TextColumn::make('first_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('second_text')
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
            'index' => Pages\ListBannergrids::route('/'),
            'create' => Pages\CreateBannergrid::route('/create'),
            'view' => Pages\ViewBannergrid::route('/{record}'),
            'edit' => Pages\EditBannergrid::route('/{record}/edit'),
        ];
    }
}
