<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSystemPermissionsTable
 */
class CreateSystemPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_permissions', function (Blueprint $table) {
            $table->id()->comment('系统权限表');
            $table->unsignedTinyInteger('type')->default(1)->comment('权限类型:1=菜单,2=按钮');
            $table->string('name', 30)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限名称');
            $table->string('describe', 200)->default('')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限描述');
            $table->string('icon', 50)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('菜单图标');
            $table->string('router', 100)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('权限路由/Http地址');
            $table->string('component')->default('')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('前端组件');
            $table->string('action')->default('')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('控制器@方法');
            $table->integer('pid')->default(0)->comment('父级ID');
            $table->string('path', 20)->default('')->nullable()->comment('路径');
            $table->integer('sorting')->default(0)->comment('排序');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态:1=显示,2=隐藏');
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
        Schema::dropIfExists('system_permissions');
    }
}
