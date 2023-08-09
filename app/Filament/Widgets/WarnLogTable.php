<?php

namespace App\Filament\Widgets;

use App\Models\Tag\TagBind;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class WarnLogTable extends BaseWidget
{
    protected static ?int $sort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->heading('丢失物品')
            ->query(
                TagBind::query()
                    ->where('id', 1)
                    ->with('moveLog')
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('标签图片'),
                Tables\Columns\TextColumn::make('name')->color('danger')->label('标签名称'),
                Tables\Columns\TextColumn::make('moveLog.station_code_before')->color('danger')->label('消失前所处基站编号'),
                Tables\Columns\TextColumn::make('moveLog.station_name_before')->color('danger')->label('消失前所处基站名称'),
            ]);
    }
}
