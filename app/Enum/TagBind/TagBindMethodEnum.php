<?php

namespace App\Enum\TagBind;

use Filament\Support\Contracts\HasLabel;

enum TagBindMethodEnum: string implements HasLabel
{
    // 嵌入
    case Qr = 'qr';
    // 防爆绳
    case Fbs = 'fbs';
    // 其他
    case Qt = 'qt';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Qr => '嵌入',
            self::Fbs => '防爆绳',
            self::Qt => '其他',
        };
    }
}
