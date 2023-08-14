<?php

use App\Enum\TagWarn\TagWarnTargetLevelEnum;
use App\Enum\TagWarn\TagWarnTargetMethodEnum;
use App\Models\Tag\TagWarnTarget;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_warn_target', function (Blueprint $table) {
            $table->id();
            $table->string('name', 12)->comment('告警对象');
            $table->string('level', 12)->index()->comment('告警级别');
            $table->string('method', 12)->index()->comment('告警方式');
            $table->string('target', 80)->index()->comment('告警目标: 手机号 & 邮箱等');
            $table->text('memo')->default('')->comment('备注');
            $table->bigInteger('count')->default(0)->comment('报警次数');
            $table->timestamps();
        });

        $debug = config('app.debug');
        if ($debug) {
            $target = new TagWarnTarget();
            $target->name = '杨伟杰 语音';
            $target->level = TagWarnTargetLevelEnum::Pt;
            $target->method = TagWarnTargetMethodEnum::Voice;
            $target->target = '18681671272';
            $target->count = 5;
            $target->save();

            $target = new TagWarnTarget();
            $target->name = '杨伟杰 短信';
            $target->level = TagWarnTargetLevelEnum::Pt;
            $target->method = TagWarnTargetMethodEnum::Sms;
            $target->target = '18681671272';
            $target->save();

            $target = new TagWarnTarget();
            $target->name = '杨伟杰 email';
            $target->level = TagWarnTargetLevelEnum::Jj;
            $target->method = TagWarnTargetMethodEnum::Email;
            $target->target = 'sia-fl@outlook.com';
            $target->save();

            $target = new TagWarnTarget();
            $target->name = '外部预警消息推送';
            $target->level = TagWarnTargetLevelEnum::FcJj;
            $target->method = TagWarnTargetMethodEnum::Http;
            $target->target = 'https://a.b.com/api/v1/xxx';
            $target->count = 1;
            $target->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_warn_target');
    }
};
