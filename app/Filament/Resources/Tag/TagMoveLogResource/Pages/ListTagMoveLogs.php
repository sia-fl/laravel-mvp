<?php

namespace App\Filament\Resources\Tag\TagMoveLogResource\Pages;

use App\Filament\Resources\Tag\TagMoveLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagMoveLogs extends ListRecords
{
    protected static string $resource = TagMoveLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
