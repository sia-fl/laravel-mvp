<?php

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
    }

    public function down(): void
    {
        Schema::dropIfExists('computer');
    }
};
