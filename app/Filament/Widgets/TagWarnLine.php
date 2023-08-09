<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TagWarnLine extends ChartWidget
{
    protected static ?string $heading = '告警概览';

    protected static ?int $sort = 0;

    protected static ?string $maxHeight = '240px';

    protected function getData(): array
    {
        return [
            'labels' => ['周一', '周二', '周三', '周四', '周五', '周六', '周日'],
            'datasets' => [
                [
                    'label' => '普通预警',
                    'data' => [12, 19, 3, 5, 2, 3, 9],
                    'borderColor' => '#eee',
                    'tension' => 0.3,
                ],
                [
                    'label' => '紧急预警',
                    'data' => [0, 3, 0, 4, 0, 0, 0],
                    'borderColor' => '#eee507',
                    'tension' => 0.3,
                ],
                [
                    'label' => '非常紧急预警',
                    'data' => [0, 2, 0, 1, 0, 0, 0],
                    'borderColor' => '#ee074c',
                    'tension' => 0.3,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
