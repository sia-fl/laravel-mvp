<?php

namespace App\Filament\Widgets;

use App\Enum\TagBind\TagBindWarnEnum;
use App\Models\Tag\TagBind;
use Filament\Widgets\ChartWidget;

class TagBindDistributionChart extends ChartWidget
{
    protected static ?string $heading = '按分部情况统计标签数量';

    protected static ?int $sort = 5;

    protected static ?string $maxHeight = '240px';

    protected function getData(): array
    {
        return [
            'labels' => ['机房A', '机房B', '工厂', '食堂', '操场'],
            'datasets' => [
                [
                    'label' => '按分部情况统计标签数量',
                    'data' => [11, 16, 7, 3, 14],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
