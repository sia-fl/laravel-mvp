<?php

namespace App\Enum\TagWarn;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TagWarnTargetLevelEnum: string implements HasLabel, HasColor
{
    case Pt = 'pt';
    case Jj = 'jj';
    case FcJj = 'fcjj';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pt => '普通',
            self::Jj => '紧急',
            self::FcJj => '非常紧急',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Pt => 'gray',
            self::Jj => 'warning',
            self::FcJj => 'danger',
        };
    }
}
