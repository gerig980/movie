<?php

namespace App\Filament\Resources\ActorsResource\Pages;

use App\Filament\Resources\ActorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActors extends ListRecords
{
    protected static string $resource = ActorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
