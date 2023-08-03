<?php

namespace App\Enum\TagBind;

use Filament\Support\Contracts\HasLabel;

enum TagBindProtectEnum: string implements HasLabel
{
    // 啸叫
    case Support = 'yes';
    // 否 不支持
    case UNSupport = 'no';
    case T1 = 't1';
    case T2 = 't2';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Support => '支持',
            self::UNSupport => '不支持',
            self::T1 => 'T1',
            self::T2 => 'T2',
        };
    }
}
