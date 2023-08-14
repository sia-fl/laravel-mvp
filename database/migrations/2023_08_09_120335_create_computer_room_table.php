<?php

use App\Models\Computer\ComputerRoom;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('computer_room', function (Blueprint $table) {
            $table->id();
            $table->string('image', 200)->comment('图片');
            $table->string('code', 120)->index()->comment('机房编号');
            $table->string('name', 120)->index()->comment('机房名称');
            $table->text('memo')->default('')->comment('备注');
            $table->timestamps();
        });

        $debug = config('app.debug');
        if ($debug) {
            $room = new ComputerRoom();
            $room->name = '机房1';
            $room->code = 'room-1';
            $room->image = 'computer/test/computer_room_1.jpeg';
            $room->save();

            $room = new ComputerRoom();
            $room->name = '机房2';
            $room->code = 'room-2';
            $room->image = 'computer/test/computer_room_3.jpeg';
            $room->save();
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('computer_room');
    }
};
