<?php

namespace App\Filament\Resources\Tag\TagBindResource\Widgets;

use App\Enum\TagBind\TagBindWarnEnum;
use App\Filament\Resources\Tag\TagBindResource\Pages\ListTagBinds;
use App\Models\Tag\TagBind;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TagBindCount extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    public array $tableColumnSearches = [

    ];

    protected function getTablePage(): string
    {
        return ListTagBinds::class;
    }

    protected function getStats(): array
    {
        $count1 = TagBind::query()
            ->where('warn', TagBindWarnEnum::Support)
            ->count();
        $count2 = TagBind::query()
            ->where('warn', TagBindWarnEnum::UNSupport)
            ->count();

        return [
            Stat::make('支持 / 不支持啸叫 标签数', "$count1 / $count2 个"),
            Stat::make('当日告警次数', '0 次')->description('当日 0 点 至 23:59'),
            Stat::make('物品活动指数', '3')->description('以物品在基站中穿梭次数累计'),
        ];
    }
}
