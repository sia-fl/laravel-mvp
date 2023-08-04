<?php

namespace App\Models\Tag;

use App\Enum\TagBind\TagBindMethodEnum;
use App\Enum\TagBind\TagBindProtectEnum;
use App\Enum\TagBind\TagBindWarnEnum;
use App\Enum\TagMoveLog\TagMoveLogStateEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

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
        'state' => TagMoveLogStateEnum::class
    ];

    public function tagBind()
    {
        return $this->hasOne(TagBind::class, 'code', 'code');
    }
}
