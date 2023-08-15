<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TagWarnLineJj extends ChartWidget
{
    protected static ?string $heading = '紧急告警趋势概览';

    protected static ?int $sort = 2;

    protected static ?string $maxHeight = '240px';

    protected function getData(): array
    {
        return [
            'labels' => ['前六天', '前五天', '前四天', '前三天', '前二天', '前一天', '今天'],
            'datasets' => [
                [
                    'label' => '紧急预警',
                    'data' => [0, 2, 0, 1, 4, 0, 0],
                    'order' => 1,
                    'fill' => 'start',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
