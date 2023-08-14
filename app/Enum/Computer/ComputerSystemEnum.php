<?php

namespace App\Enum\Computer;

use Filament\Support\Contracts\HasLabel;

enum ComputerSystemEnum: string implements HasLabel
{
    case Win7 = 'win7';
    case Win10 = 'win10';
    case Win11 = 'win11';
    case Linux = 'linux';
    case Centos = 'centOS';
    case Ubuntu = 'ubuntu';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Win7 => 'windows7',
            self::Win10 => 'windows10',
            self::Win11 => 'windows11',
            self::Linux => 'linux',
            self::Centos => 'centOS',
            self::Ubuntu => 'ubuntu',
        };
    }
}
