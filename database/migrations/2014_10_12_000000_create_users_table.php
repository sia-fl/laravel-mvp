<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('用户名');
            $table->string('phone')->index()->comment('手机号');
            $table->string('email')->default('')->index()->comment('邮箱');
            $table->timestamp('phone_verified_at')->nullable()->comment('手机号验证时间');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user->name = 'test';
        $user->phone = '19977775555';
        $user->email = 't@t.com';
        $user->password = Hash::make('1');
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
