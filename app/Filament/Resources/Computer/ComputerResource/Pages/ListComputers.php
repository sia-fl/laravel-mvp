<?php

namespace App\Filament\Resources\Computer\ComputerResource\Pages;

use App\Filament\Resources\Computer\ComputerResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComputers extends ListRecords
{
    protected static string $resource = ComputerResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
