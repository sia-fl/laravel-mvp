<?php

namespace App\Filament\Widgets;

use App\Enum\TagBind\TagBindWarnEnum;
use App\Models\Tag\TagBind;
use Filament\Widgets\ChartWidget;

class TagBindCountPie extends ChartWidget
{
    protected static ?string $heading = '按啸叫支持情况统计标签数量';

    protected static ?int $sort = 0;

    protected static ?string $maxHeight = '240px';

    protected function getData(): array
    {
        $count1 = TagBind::query()
            ->where('warn', TagBindWarnEnum::Support)
            ->count();
        $count2 = TagBind::query()
            ->where('warn', TagBindWarnEnum::UNSupport)
            ->count();

        return [
            'labels' => ['支持啸叫', '不支持啸叫'],
            'datasets' => [
                [
                    'label' => '按啸叫支持情况统计',
                    'data' => [$count1, $count2],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
