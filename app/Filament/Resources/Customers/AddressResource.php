<?php

namespace App\Filament\Resources\Customers;

use App\Filament\Resources\Customers\AddressResource\Pages;
use App\Filament\Resources\Customers\AddressResource\RelationManagers;
use App\Models\Customers\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = null;
    protected static ?string $navigationGroup = null;
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country')
                    ->label(__('Country'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->label(__('State'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->label(__('City'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->label(__('Postal Code'))
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('address_line_1')
                    ->label(__('Personal Address'))
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('address_line_2')
                    ->label(__('Shipping Address'))
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->label(__('Username'))
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country')
                    ->label(__('Country'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->label(__('State'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('City'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address_line_1')
                    ->label(__('Personal Address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_line_2')
                    ->label(__('Shipping Address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->label(__('Postal Code'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Username'))
                    ->numeric()
                    ->sortable()
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'view' => Pages\ViewAddress::route('/{record}'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }

    // Método para obtener el label traducido.
    public static function getNavigationLabel(): string
    {
        return __('Addresses');
    }
 
    // Método para obtener el grupo de navegación traducido.
    public static function getNavigationGroup(): string
    {
        return __('Users');
    }
}
