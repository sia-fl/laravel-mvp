<?php

namespace App\Filament\Widgets;

use App\Models\Tag\TagStation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TagBindStats extends BaseWidget
{
    protected static ?int $sort = 4;

    protected function getStats(): array
    {
        return [
            Stat::make('物品丢失', '0 件'),
            Stat::make('借出物品数量', '1 件')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->description('较昨日同比下降 1 件')
                ->color('success'),
            Stat::make('总计在线', '156 件')
                ->description('在线率 100%')
                ->color('success'),
        ];
    }
}
