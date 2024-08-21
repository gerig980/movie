<?php

namespace App\Filament\Resources\ActorsResource\Pages;

use App\Filament\Resources\ActorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActors extends EditRecord
{
    protected static string $resource = ActorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
