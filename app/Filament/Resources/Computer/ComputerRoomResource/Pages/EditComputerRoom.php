<?php

namespace App\Filament\Resources\Computer\ComputerRoomResource\Pages;

use App\Filament\Resources\Computer\ComputerRoomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComputerRoom extends EditRecord
{
    protected static string $resource = ComputerRoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
