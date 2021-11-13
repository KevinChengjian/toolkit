<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSystemUsersTable
 */
class CreateSystemUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_users', function (Blueprint $table) {
            $table->id()->comment('系统用户表');
            $table->string('username', 50)->unique()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('登录账号');
            $table->string('password', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('登录密码');
            $table->string('nickname', 30)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('账户昵称');
            $table->string('avatar', 200)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('头像');
            $table->string('phone', 20)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('手机号码');
            $table->string('email', 100)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('邮件地址');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态:1=启用,2=禁用');
            $table->softDeletes();
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_users');
    }
}
