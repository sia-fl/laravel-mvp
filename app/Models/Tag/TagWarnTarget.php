<?php

namespace App\Models\Tag;

use App\Enum\TagWarn\TagWarnTargetLevelEnum;
use App\Enum\TagWarn\TagWarnTargetMethodEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTagWarnTarget
 */
class TagWarnTarget extends Model
{
    use ModelTrait;

    protected $table = 'tag_warn_target';

    protected $guarded = [];

    protected $casts = [
        'method' => TagWarnTargetMethodEnum::class,
        'level' => TagWarnTargetLevelEnum::class
    ];
}
