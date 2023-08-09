<?php

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
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('computer_room');
    }
};
