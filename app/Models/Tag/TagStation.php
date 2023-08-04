<?php

namespace App\Models\Tag;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperTagStation
 */
class TagStation extends Model
{
    use ModelTrait;

    protected $table = 'tag_station';

    protected $guarded = [];

    public function nearby(): HasMany
    {
        return $this->hasMany(TagMoveLog::class, 'code', 'code')->where('station_code_after', $this->code);
    }
}
