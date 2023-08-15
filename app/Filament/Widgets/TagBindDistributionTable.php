<?php

namespace App\Filament\Widgets;

use App\Filament\Component\ReImageColumn;
use App\Models\Tag\TagBind;
use Exception;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TagBindDistributionTable extends BaseWidget
{
    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = 'full';

    /**
     * @throws Exception
     */
    public function table(Table $table): Table
    {
        return $table
            ->query(TagBind::query())
            ->viewData([])
            ->heading('标签在线状态')
            ->filtersFormColumns(2)
            ->filters([
                Tables\Filters\SelectFilter::make('address')
                    ->options([
                        '机房A' => '机房A',
                        '机房B' => '机房B',
                        '工厂' => '工厂',
                        '食堂' => '食堂',
                        '操场' => '操场',
                    ])
                    ->label('所在地区'),
                Tables\Filters\SelectFilter::make('state')
                    ->options([
                        '在线' => '在线',
                        '离线' => '离线',
                        '丢失' => '丢失'
                    ])
                    ->label('状态')
            ], layout: FiltersLayout::AboveContent)
            ->columns([
                ReImageColumn::make('image')->label('标签图片'),
                Tables\Columns\TextColumn::make('address')->default('工厂')->label('所在地区'),
                Tables\Columns\TextColumn::make('state')->default('在线')->badge()->color('success')->label('状态'),
                Tables\Columns\TextColumn::make('name')
                    ->label('标签名称')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('code')
                    ->label('标签编号')
                    ->copyable()
                    ->extraCellAttributes(['style' => 'min-width: 150px;'])
                    ->searchable(isIndividual: true, isGlobal: false),
            ]);
    }
}
