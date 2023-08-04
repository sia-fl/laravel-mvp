<?php

namespace App\Filament\Resources\Tag\TagWarnRuleInResource\Pages;

use App\Filament\Resources\Tag\TagWarnRuleInResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagWarnRuleIns extends ListRecords
{
    protected static string $resource = TagWarnRuleInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
