<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\NewsResource\Pages;
use App\Filament\Resources\News\NewsResource\RelationManagers;
use App\Filament\Resources\News\NewsResource\RelationManagers\AuthorsRelationManager;
use App\Filament\Resources\News\NewsResource\RelationManagers\NewstagsRelationManager;
use App\Models\News\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = null;

    protected static ?string $navigationGroup = null;

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->label(__('Subtitle'))
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('resume')
                    ->label(__('Resume'))
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('header')
                    ->label(__('Header'))
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('section_1')
                    ->label(__('Section One'))
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('section_2')
                    ->label(__('Section Two'))
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('content')
                    ->label(__('Content'))
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('conclusion')
                    ->label(__('Conclusion'))
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('header_image')
                    ->label(__('Header Image'))
                    ->disk('public')
                    ->directory('news-images')
                    ->image()
                    ->imageEditor(),
                Forms\Components\FileUpload::make('second_image')
                    ->label(__('Second Image'))
                    ->disk('public')
                    ->directory('news-images')
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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label(__('Subtitle'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('header_image')
                    ->label(__('Header Image')),
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
            AuthorsRelationManager::class,
            NewstagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'view' => Pages\ViewNews::route('/{record}'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('News');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('News');
    }
}
