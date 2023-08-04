<?php

use App\Enum\TagMoveLog\TagMoveLogStateEnum;
use App\Models\Tag\TagMoveLog;
use App\Models\Tag\TagStation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tag_move_log', function (Blueprint $table) {
            $table->id();
            $table->string('code', 120)->index()->comment('标签编号');
            $table->string('state', 12)->index()->comment('状态');
            $table->string('station_code_before', 120)->default('')->index()->comment('移动前所在基站编号');
            $table->string('station_name_before', 120)->default('')->index()->comment('移动前所在基站名称');
            $table->string('station_code_after', 120)->default('')->index()->comment('移动后所在基站编号');
            $table->string('station_name_after', 120)->default('')->index()->comment('移动后所在基站名称');
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->nullable()->comment('创建时间');
        });

        /** @var TagStation $a60Station */
        $a60Station = TagStation::query()
            ->where('code', 'A60')
            ->first();

        /** @var TagStation $a61Station */
        $a61Station = TagStation::query()
            ->where('code', 'A61')
            ->first();

        $debug = config('app.debug');
        if ($debug) {
            $log = new TagMoveLog();
            $log->code = '2308601564';
            $log->state = TagMoveLogStateEnum::Fx;
            $log->station_code_after = $a60Station->code;
            $log->station_name_after = $a60Station->name;
            $log->created_at = '2023-08-03 09:37:55';
            $log->save();

            $log = new TagMoveLog();
            $log->code = '2308601564';
            $log->state = TagMoveLogStateEnum::Xs;
            $log->station_code_before = $a60Station->code;
            $log->station_name_before = $a60Station->name;
            $log->created_at = '2023-08-03 09:38:12';
            $log->save();

            $log = new TagMoveLog();
            $log->code = '2308601564';
            $log->state = TagMoveLogStateEnum::Fx;
            $log->station_code_after = $a60Station->code;
            $log->station_name_after = $a60Station->name;
            $log->created_at = '2023-08-03 09:40:05';
            $log->save();

            $log = new TagMoveLog();
            $log->code = '2308601564';
            $log->state = TagMoveLogStateEnum::Yd;
            $log->station_code_before = $a60Station->code;
            $log->station_name_before = $a60Station->name;
            $log->station_code_after = $a61Station->code;
            $log->station_name_after = $a61Station->name;
            $log->created_at = '2023-08-03 09:45:21';
            $log->save();

            $log = new TagMoveLog();
            $log->code = '2308601564';
            $log->state = TagMoveLogStateEnum::Xs;
            $log->station_code_before = $a61Station->code;
            $log->station_name_before = $a61Station->name;
            $log->created_at = '2023-08-03 10:02:48';
            $log->save();

            $log = new TagMoveLog();
            $log->code = '2719021849';
            $log->state = TagMoveLogStateEnum::Fx;
            $log->station_code_after = $a60Station->code;
            $log->station_name_after = $a60Station->name;
            $log->created_at = '2023-08-03 09:37:55';
            $log->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_move_log');
    }
};
