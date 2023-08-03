<?php

namespace App\Enum\TagBind;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TagBindWarnEnum: string implements HasLabel, HasColor
{
    // 啸叫
    case Support = 'yes';
    // 否 不支持
    case UNSupport = 'no';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Support => '支持',
            self::UNSupport => '不支持',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Support => 'info',
            self::UNSupport => 'warning',
        };
    }
}
