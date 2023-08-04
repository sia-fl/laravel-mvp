<?php

namespace App\Models\Tag;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperTagWarnRuleIn
 */
class TagWarnRuleIn extends Model
{
    use ModelTrait;

    protected $table = 'tag_warn_rule_in';

    protected $guarded = [];

    public function warnTargets(): BelongsToMany
    {
        return $this->belongsToMany(TagWarnTarget::class, 'tag_warn_rule_target', 'tag_warn_rule_in_id', 'tag_warn_target_id');
    }

    public function tagBind(): HasOne
    {
        return $this->hasOne(TagBind::class, 'code', 'tag_bind_code');
    }

    public function tagStation(): HasOne
    {
        return $this->hasOne(TagStation::class, 'code', 'tag_station_code');
    }
}
