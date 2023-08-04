<?php

namespace App\Enum\TagMoveLog;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TagMoveLogStateEnum: string implements HasLabel, HasColor
{
    // 移动
    case Yd = 'yd';
    // 发现
    case Fx = 'fx';
    // 消失
    case Xs = 'xs';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Yd => '移动',
            self::Fx => '发现',
            self::Xs => '消失',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Yd => 'gray',
            self::Fx => 'info',
            self::Xs => 'danger',
        };
    }
}
