<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudioResource\Pages;
use App\Filament\Resources\StudioResource\RelationManagers;
use App\Models\Studio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudioResource extends Resource
{
    protected static ?string $model = Studio::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationLabel = 'Estúdios';

    protected static ?string $navigationGroup = 'Projetos';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('projects_count')
                    ->sortable()
                    ->counts('projects'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s')->since(),

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
            'index' => Pages\ManageStudios::route('/'),
        ];
    }
}
