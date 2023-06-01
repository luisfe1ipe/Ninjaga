<?php

namespace App\Filament\Resources\ChapterResource\Pages;

use App\Filament\Resources\ChapterResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChapters extends ListRecords
{
    protected static string $resource = ChapterResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
