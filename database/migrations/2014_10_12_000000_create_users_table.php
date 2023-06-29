<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable()->comment('Tên người dùng');
            $table->date('dob')->nullable()->comment('Ngày sinh');
            $table->tinyInteger('gender')->default(0)->comment('Giới tính: 1 là Nam, 2 là Nữ, 0 là Không xác định/Khác');

            $table->string('phone', 10)->unique()->nullable()->comment('Số điện thoại của người dùng');
            $table->string('email')->unique()->comment('Email của người dùng');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Mật khẩu');
            $table->rememberToken();

            $table->string('avatar', 255)->nullable()->comment('Đường dẫn ảnh đại diện');
            $table->unsignedBigInteger('role_id')->default(0)->comment('Loại tài khoản đang dùng: 1 là Admin, 2 là Nhân viên, 3 là Người dùng, 0 là Khác');
            $table->tinyInteger('status')->default(1)->comment('Trạng thái của tài khoản: 0 là không hoạt động, 1 là hoạt động');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
