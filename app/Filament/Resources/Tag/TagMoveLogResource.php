<?php

namespace App\Filament\Resources\Tag;

use App\Filament\Resources\Tag\TagMoveLogResource\Pages;
use App\Models\Tag\TagMoveLog;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;

class TagMoveLogResource extends Resource
{
    protected static ?string $model = TagMoveLog::class;

    protected static ?string $navigationGroup = '基站';

    protected static ?string $label = '轨迹日志';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?int $navigationSort = 6;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('tagBind.image')->label('标签预览'),
                Tables\Columns\TextColumn::make('code')->label('标签编号')->searchable(),
                Tables\Columns\ImageColumn::make('tagStationBefore.image')->label('移动前的基站'),
                Tables\Columns\TextColumn::make('tagStationBefore.code')->label('移动前的基站编号')->searchable(),
                Tables\Columns\TextColumn::make('tagStationBefore.name')->label('移动前的基站名称')->searchable(),
                Tables\Columns\ImageColumn::make('tagStationAfter.image')->label('移动后的基站'),
                Tables\Columns\TextColumn::make('tagStationAfter.code')->label('移动后的基站编号')->searchable(),
                Tables\Columns\TextColumn::make('tagStationAfter.name')->label('移动后的基站名称')->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagMoveLogs::route('/'),
        ];
    }
}
