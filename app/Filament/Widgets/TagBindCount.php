<?php

namespace App\Filament\Widgets;

use App\Models\Tag\TagStation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TagBindCount extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            Stat::make('当日告警次数', '0 次')->description('当日 0 点 至 23:59'),
            Stat::make('物品活动指数', '3')->description('以物品在基站中穿梭次数累计'),
            Stat::make('基站数量', TagStation::query()->count())
                ->color('success'),
            Stat::make('物品活动趋势', '412')
                ->description('统计近7天')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([17, 16, 48, 15, 14, 72, 12])
                ->color('info'),
        ];
    }
}
