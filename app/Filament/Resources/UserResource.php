<?php

namespace App\Filament\Resources;

use App\Filament\Exports\UserExporter;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = null;
    protected static ?string $navigationGroup = null;
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Username'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->label(__('First Name'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->label(__('Last Name'))
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth')
                    ->label(__('Birth')),
                Forms\Components\TextInput::make('phone_code')
                    ->label(__('Phone Code'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->label(__('Phone Number'))
                    ->tel()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('bio')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('profile_image')
                    ->label(__('Profile Image'))
                    ->preserveFilenames()
                    ->imageEditor()
                    ->image(),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at')
                    ->label(__('Email Verified At')),
                Forms\Components\TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Username'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->label(__('First Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label(__('Last Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birth')
                    ->label(__('Birth'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_code')
                    ->label(__('Phone Number'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('Phone Number'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('profile_image')
                    ->label(__('Profile Image'))
                    ->circular(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label(__('Email Verified At'))
                    ->dateTime()
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
            ->headerActions([
                ExportAction::make()->exporter(UserExporter::class),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()->exporter(UserExporter::class),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Users');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Users');
    }
}
