<?php

namespace App\Filament\Resources\Tag;

use App\Filament\Resources\Tag\TagMoveLogResource\Pages;
use App\Models\Tag\TagBind;
use App\Models\Tag\TagMoveLog;
use App\Models\Tag\TagStation;
use Exception;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TagMoveLogResource extends Resource
{
    protected static ?string $model = TagMoveLog::class;

    protected static ?string $navigationGroup = '基站';

    protected static ?string $label = '轨迹日志';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?int $navigationSort = 6;

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('标签编号'),
                TextColumn::make('tagStationBefore.code')
                    ->label('移动前的基站编号'),
                TextColumn::make('tagStationBefore.name')
                    ->label('移动前的基站名称'),
                TextColumn::make('tagStationAfter.code')
                    ->label('移动后的基站编号'),
                TextColumn::make('tagStationAfter.name')
                    ->label('移动后的基站名称'),
            ])
            ->filtersFormColumns(3)
            ->filters([
                SelectFilter::make('code')
                    ->placeholder('')
                    ->label('标签')
                    ->options(TagBind::query()->get()->pluck('code', 'code')->toArray())
                    ->searchable(),
                SelectFilter::make('station_code_before')
                    ->placeholder('')
                    ->label('移动前的基站')
                    ->options(TagStation::query()->get()->pluck('name', 'code')->toArray())
                    ->searchable(),
                SelectFilter::make('station_code_after')
                    ->placeholder('')
                    ->label('移动后的基站')
                    ->options(TagStation::query()->get()->pluck('name', 'code')->toArray())
                    ->searchable(),
            ], layout: FiltersLayout::AboveContent);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagMoveLogs::route('/'),
        ];
    }
}
