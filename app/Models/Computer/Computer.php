<?php

namespace App\Models\Computer;

use App\Enum\Computer\ComputerStateEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function room(): HasOne
    {
        return $this->hasOne(ComputerRoom::class, 'code', 'computed_room_code');
    }
}
