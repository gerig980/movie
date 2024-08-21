<?php

namespace App\Filament\Resources\ActorsResource\Pages;

use App\Filament\Resources\ActorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateActors extends CreateRecord
{
    protected static string $resource = ActorsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
