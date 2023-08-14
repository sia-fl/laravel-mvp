<?php

namespace App\Filament\Component;

use Filament\Tables\Columns\ImageColumn;

class ReImageColumn extends ImageColumn
{
    protected array $extraImgAttributes = [
        ['style' => 'height: 2.5rem;border-radius: 4px;']
    ];
}
