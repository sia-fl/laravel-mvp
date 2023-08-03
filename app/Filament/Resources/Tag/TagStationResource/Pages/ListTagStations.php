<?php

namespace App\Filament\Resources\Tag\TagStationResource\Pages;

use App\Filament\Resources\Tag\TagStationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagStations extends ListRecords
{
    protected static string $resource = TagStationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
