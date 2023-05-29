<?php

namespace App\Filament\Resources\StatusResource\Pages;

use App\Filament\Resources\StatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatuses extends ManageRecords
{
    protected static string $resource = StatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
