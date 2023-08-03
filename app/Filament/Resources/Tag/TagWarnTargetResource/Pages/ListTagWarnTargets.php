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

    public function getTabs(): array
    {
        return [
            'all' => ListRecords\Tab::make('全部'),
            'pt' => ListRecords\Tab::make('普通')->query(fn($query) => $query->where('level', 'pt')),
            'jj' => ListRecords\Tab::make('紧急')->query(fn($query) => $query->where('level', 'jj')),
            'fcjj' => ListRecords\Tab::make('非常紧急')->query(fn($query) => $query->where('level', 'fcjj')),
        ];
    }
}
