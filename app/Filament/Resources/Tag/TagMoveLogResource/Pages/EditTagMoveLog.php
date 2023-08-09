<?php

namespace App\Filament\Resources\Tag\TagMoveLogResource\Pages;

use App\Filament\Resources\Tag\TagMoveLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagMoveLog extends EditRecord
{
    protected static string $resource = TagMoveLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
