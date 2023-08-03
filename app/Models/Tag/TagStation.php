<?php

namespace App\Models\Tag;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTagStation
 */
class TagStation extends Model
{
    use ModelTrait;

    protected $table = 'tag_station';

    protected $guarded = [];
}
