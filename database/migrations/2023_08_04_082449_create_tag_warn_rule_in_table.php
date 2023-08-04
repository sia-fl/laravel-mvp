<?php

use App\Models\Tag\TagBind;
use App\Models\Tag\TagStation;
use App\Models\Tag\TagWarnRuleIn;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tag_warn_rule_in', function (Blueprint $table) {
            $table->id();
            $table->string('tag_bind_code', 120)->index()->comment('标签编号');
            $table->string('tag_station_code', 120)->index()->comment('基站编号');
            $table->timestamps();
        });

        Schema::create('tag_warn_rule_target', function (Blueprint $table) {
            $table->id();
            $table->string('tag_warn_rule_in_id', 120)->index()->comment('告警规则编号');
            $table->string('tag_warn_target_id', 120)->index()->comment('告警对象编号');
        });

        $debug = config('app.debug');
        if ($debug) {
            $ruleIn = new TagWarnRuleIn();
            $ruleIn->tag_bind_code = '2308601564';
            $ruleIn->tag_station_code = 'A60';
            $ruleIn->save();

            $ruleIn->warnTargets()->toggle([1, 2, 4]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_warn_rule');
    }
};
