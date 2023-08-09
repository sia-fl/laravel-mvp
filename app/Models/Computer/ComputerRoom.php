<?php

namespace App\Models\Computer;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperComputerRoom
 */
class ComputerRoom extends Model
{
    use ModelTrait;

    protected $guarded = [];

    protected $table = 'computer_room';
}
