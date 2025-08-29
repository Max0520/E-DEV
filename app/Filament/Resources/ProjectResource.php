<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Category;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Projets';
    protected static ?string $pluralModelLabel = 'Projets';
    protected static ?string $modelLabel = 'Projet';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre du projet')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->rows(5)
                    ->required(),

                Forms\Components\Select::make('category_id')
                    ->label('Catégorie')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->label('Prix (Ar)')
                    ->numeric()
                    ->prefix('Ar')
                    ->required(),

                Forms\Components\FileUpload::make('image')
    ->label('Image du projet')
    ->image()
    ->maxSize(2048) // en Ko
    ->required(),

    Forms\Components\TextInput::make('buy_link')
    ->label('Lien d’achat')
    ->url()
    ->nullable()
    ->prefix('https://')
    ->columnSpanFull()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('title')->label('Titre')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Catégorie'),
                Tables\Columns\TextColumn::make('price')->label('Prix')->money('MGA', true),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->date(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
