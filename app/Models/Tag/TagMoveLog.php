<?php

namespace App\Models\Tag;

use App\Enum\TagMoveLog\TagMoveLogStateEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperTagMoveLog
 */
class TagMoveLog extends Model
{
    use ModelTrait;

    protected $table = 'tag_move_log';

    protected $guarded = [];

    const UPDATED_AT = null;

    protected $casts = [
        'state' => TagMoveLogStateEnum::class,
    ];

    public function tagBind()
    {
        return $this->hasOne(TagBind::class, 'code', 'code');
    }

    public function tagStationBefore(): HasOne
    {
        return $this->hasOne(TagStation::class, 'code', 'station_code_before');
    }

    public function tagStationAfter(): HasOne
    {
        return $this->hasOne(TagStation::class, 'code', 'station_code_after');
    }
}
