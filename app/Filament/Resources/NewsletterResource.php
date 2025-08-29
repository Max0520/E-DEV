<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterResource\Pages;
use Filament\Resources\Resource;
use Filament\Forms;
use App\Models\Newsletter;
use Filament\Tables;
use Filament\Forms\Form; // ✅ Correct pour form()
use Filament\Tables\Table; // ✅ Correct pour table()

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Newsletter';

    // Formulaire
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(Newsletter::class, 'email'),
            ]);
    }

    // Tableau dans Filament
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Inscrit le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}
