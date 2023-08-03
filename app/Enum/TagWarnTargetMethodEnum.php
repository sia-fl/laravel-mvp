<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum TagWarnTargetMethodEnum: string implements HasLabel
{
    case Sms = 'sms';
    case Voice = 'voice';
    case Email = 'email';
    case Http = 'http';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Sms => '手机短信',
            self::Voice => '语音播报',
            self::Email => '邮箱',
            self::Http => 'HTTP POST',
        };
    }
}
