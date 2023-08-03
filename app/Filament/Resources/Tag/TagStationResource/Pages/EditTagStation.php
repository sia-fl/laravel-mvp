<?php

namespace App\Filament\Resources\Tag\TagStationResource\Pages;

use App\Filament\Resources\Tag\TagStationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagStation extends EditRecord
{
    protected static string $resource = TagStationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
