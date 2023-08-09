<?php

namespace App\Models\Computer;

use App\Enum\Computer\ComputerStateEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperComputer
 */
class Computer extends Model
{
    use ModelTrait;

    protected $guarded = [];

    protected $table = 'computer';

    protected $casts = [
        'state' => ComputerStateEnum::class,
    ];
}
