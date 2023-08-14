<?php

use App\Enum\Computer\ComputerStateEnum;
use App\Enum\Computer\ComputerSystemEnum;
use App\Models\Computer\Computer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('computer', function (Blueprint $table) {
            $table->id();
            $table->string('image', 200)->comment('图片');
            $table->string('state', 20)->index()->comment('使用状态');
            $table->string('computed_room_code', 120)->index()->comment('电脑所在机房');
            $table->string('code', 120)->index()->comment('电脑编号');
            $table->string('model', 120)->comment('电脑型号');
            $table->string('motherboard', 40)->index()->comment('主板');
            $table->string('cpu', 40)->index()->comment('CPU');
            $table->string('memory', 40)->index()->comment('内存');
            $table->string('disk', 40)->index()->comment('硬盘');
            $table->string('graphics', 40)->index()->comment('显卡');
            $table->string('os', 40)->index()->comment('操作系统');
            $table->string('ip', 40)->index()->comment('IP地址');
            $table->timestamps();
        });

        $debug = config('app.debug');
        if ($debug) {
            $computer = new Computer();
            $computer->computed_room_code = 'room-1';
            $computer->code = 'computer-1';
            $computer->image = 'computer/test/computer_1.jpeg';
            $computer->state = ComputerStateEnum::Zc;
            $computer->model = 'HP 800 G1';
            $computer->motherboard = 'HP 800 G1';
            $computer->cpu = 'Intel(R) Core(TM) i5-4590 CPU @ 3.30GHz';
            $computer->memory = '8.00GB';
            $computer->disk = '256GB';
            $computer->graphics = 'NVIDIA GeForce GTX 750 Ti';
            $computer->os = ComputerSystemEnum::Win10;
            $computer->ip = '192.168.31.44';
            $computer->save();

            $computer = new Computer();
            $computer->computed_room_code = 'room-1';
            $computer->code = 'computer-2';
            $computer->image = 'computer/test/computer_2.jpeg';
            $computer->state = ComputerStateEnum::Zc;
            $computer->model = '华硕';
            $computer->motherboard = '华硕';
            $computer->cpu = 'Intel(R) Core(TM) i5-4590 CPU @ 3.30GHz';
            $computer->memory = '8.00GB';
            $computer->disk = '256GB';
            $computer->graphics = 'NVIDIA GeForce GTX 750 Ti';
            $computer->os = ComputerSystemEnum::Win10;
            $computer->ip = '192.168.31.45';
            $computer->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('computer');
    }
};
