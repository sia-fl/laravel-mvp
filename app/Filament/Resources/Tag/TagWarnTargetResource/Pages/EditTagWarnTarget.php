<?php

namespace App\Filament\Resources\Tag\TagWarnTargetResource\Pages;

use App\Filament\Resources\Tag\TagWarnTargetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagWarnTarget extends EditRecord
{
    protected static string $resource = TagWarnTargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
