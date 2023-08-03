<?php

namespace App\Models\Tag;

use App\Enum\TagBind\TagBindMethodEnum;
use App\Enum\TagBind\TagBindProtectEnum;
use App\Enum\TagBind\TagBindWarnEnum;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTagBind
 */
class TagBind extends Model
{
    use ModelTrait;

    protected $table = 'tag_bind';

    protected $guarded = [];

    protected $casts = [
        'warn' => TagBindWarnEnum::class,
        'protect' => TagBindProtectEnum::class,
        'method' => TagBindMethodEnum::class
    ];
}
