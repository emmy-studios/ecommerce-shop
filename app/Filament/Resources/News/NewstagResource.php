<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\NewstagResource\Pages;
use App\Filament\Resources\News\NewstagResource\RelationManagers;
use App\Models\News\Newstag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewstagResource extends Resource
{
    use Translatable;

    protected static ?string $model = Newstag::class; 

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null; 

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('Description'))
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
            'index' => Pages\ListNewstags::route('/'),
            'create' => Pages\CreateNewstag::route('/create'),
            'view' => Pages\ViewNewstag::route('/{record}'),
            'edit' => Pages\EditNewstag::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('News Tags');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('News');
    }
}
