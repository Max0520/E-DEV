<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PremiumResource\Pages;
use App\Filament\Resources\PremiumResource\RelationManagers;
use App\Models\Premium;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PremiumResource extends Resource
{
    protected static ?string $model = Premium::class;

     protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Solutions Premium';
    protected static ?string $navigationGroup = 'Monétisation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->label('Prix')
                    ->numeric()
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('premiums'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->label('Prix')->money('usd'),
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->dateTime(),
            ])

            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPremia::route('/'),
            'create' => Pages\CreatePremium::route('/create'),
            'edit' => Pages\EditPremium::route('/{record}/edit'),
        ];
    }
}
