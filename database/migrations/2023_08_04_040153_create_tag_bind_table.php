<?php

use App\Enum\TagBind\TagBindMethodEnum;
use App\Enum\TagBind\TagBindProtectEnum;
use App\Enum\TagBind\TagBindWarnEnum;
use App\Models\Tag\TagBind;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tag_bind', function (Blueprint $table) {
            $table->id();
            $table->string('image', 200)->comment('图片');
            $table->string('name', 80)->comment('标签名称');
            $table->string('code', 120)->index()->comment('标签编号');
            $table->string('warn')->index()->comment('啸叫支持');
            $table->string('protect')->index()->comment('防拆防爆');
            $table->string('method')->index()->comment('绑定方式');
            $table->text('memo')->default('')->comment('备注');

            $table->timestamps();
        });

        $debug = config('app.debug');
        if ($debug) {
            $station = new TagBind();
            $station->image = 'tag/test/tag/1.png';
            $station->name = '支持啸叫的标签';
            $station->code = '2308601564';
            $station->warn = TagBindWarnEnum::Support;
            $station->protect = TagBindProtectEnum::T2;
            $station->method = TagBindMethodEnum::Fbs;
            $station->save();

            $station = new TagBind();
            $station->image = 'tag/test/tag/2.png';
            $station->name = '不支持啸叫的标签';
            $station->code = '2719021849';
            $station->warn = TagBindWarnEnum::UNSupport;
            $station->protect = TagBindProtectEnum::T1;
            $station->method = TagBindMethodEnum::Fbs;
            $station->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_bind');
    }
};
