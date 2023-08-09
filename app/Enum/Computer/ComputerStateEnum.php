<?php

namespace App\Enum\Computer;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ComputerStateEnum: string implements HasLabel, HasColor
{
    // 正常
    case Zc = 'zc';

    // 损坏
    case Sh = 'sh';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Zc => '正常',
            self::Sh => '损坏',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Zc => 'gray',
            self::Sh => 'danger',
        };
    }
}
