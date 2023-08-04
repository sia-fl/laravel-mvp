<?php

namespace App\Filament\Resources\Tag\TagWarnRuleInResource\Pages;

use App\Filament\Resources\Tag\TagWarnRuleInResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagWarnRuleIn extends EditRecord
{
    protected static string $resource = TagWarnRuleInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
