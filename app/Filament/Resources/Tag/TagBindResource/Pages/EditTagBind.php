<?php

namespace App\Filament\Resources\Tag\TagBindResource\Pages;

use App\Filament\Resources\Tag\TagBindResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagBind extends EditRecord
{
    protected static string $resource = TagBindResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
