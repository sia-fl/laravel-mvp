<?php

namespace App\Filament\Resources\Tag\TagWarnTargetResource\Pages;

use App\Filament\Resources\Tag\TagWarnTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagWarnTargets extends ListRecords
{
    protected static string $resource = TagWarnTargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
