<?php

namespace App\Filament\Resources\Tag\TagBindResource\Pages;

use App\Filament\Resources\Tag\TagBindResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagBinds extends ListRecords
{
    protected static string $resource = TagBindResource::class;

    protected function getHeaderWidgets(): array
    {
        return TagBindResource::getWidgets();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
