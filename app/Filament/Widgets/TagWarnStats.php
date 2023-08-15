<?php

namespace App\Filament\Widgets;

use App\Models\Tag\TagStation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TagWarnStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('当日紧急告警未读', '1 条')
                ->description('总计紧急告警数量 1 条')
                ->color('danger'),
            Stat::make('当日告警次数', '5 次')
                ->description('送达率 100%')
                ->color('success'),
            Stat::make('告警通道测试', '5 分钟前')
                ->description('通道数量 4 条，成功率 100%')
                ->color('success'),
        ];
    }
}
