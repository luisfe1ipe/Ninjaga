<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Author;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner')
                    ->required()
                    ->columnSpan(2)
                    ->imagePreviewHeight('250'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Grid::make([
                    'default' => 1,
                    'md' => 2,

                ])
                    ->schema([
                        Forms\Components\TextInput::make('released_year')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('genre_id')
                            ->relationship('genres', 'name')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columnSpan(2),
                Grid::make([
                    'default' => 1,
                    'md' => 2,
                    'lg' => 4,
                ])
                    ->schema([
                        Forms\Components\Select::make('author_id')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('studio_id')
                            ->relationship('studio', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('type_id')
                            ->relationship('type', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('status_id')
                            ->relationship('status', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columnSpan(2),
                Forms\Components\MarkdownEditor::make('synopsis')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('synopsis')
                    ->limit(15),
                Tables\Columns\TextColumn::make('author.name')
                    ->limit(15),
                Tables\Columns\TextColumn::make('studio.name')
                    ->limit(15),
                Tables\Columns\TextColumn::make('type.name')
                    ->limit(15),
                Tables\Columns\TextColumn::make('status.name')
                    ->limit(15),
                Tables\Columns\TextColumn::make('genres_count')
                    ->counts('genres')
                    ->sortable(),
                Tables\Columns\TextColumn::make('released_year')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('genres')
                    ->relationship('genres', 'name')
                    ->searchable()
                    ->multiple()
                    ->columnSpan(2),
                SelectFilter::make('author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('studio')
                    ->relationship('studio', 'name')
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('type')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->searchable()
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
