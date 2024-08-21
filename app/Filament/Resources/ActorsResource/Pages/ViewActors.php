<?php

namespace App\Filament\Resources\ActorsResource\Pages;

use App\Filament\Resources\ActorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewActors extends ViewRecord
{
    protected static string $resource = ActorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
