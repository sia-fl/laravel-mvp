<?php

namespace App\Filament\Resources\Computer\ComputerResource\Pages;

use App\Filament\Resources\Computer\ComputerResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditComputer extends EditRecord
{
    protected static string $resource = ComputerResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
