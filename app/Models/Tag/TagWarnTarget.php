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
        'level' => TagWarnTargetLevelEnum::class,
    ];

    public function tagWarnRuleIns()
    {
        return $this->belongsToMany(TagWarnRuleIn::class, 'tag_warn_rule_target', 'tag_warn_target_id', 'tag_warn_rule_in_id');
    }
}
