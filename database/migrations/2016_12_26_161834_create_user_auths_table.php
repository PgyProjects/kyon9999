<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_auths', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('authName')->comment('权限名称');
            $table->boolean('manager')->default('0')->comment('管理员页面');
            $table->boolean('admin')->default('0')->comment('审核员页面');
            $table->boolean('loan')->default('0')->comment('放款页面');
            $table->boolean('cuishou')->default('0')->comment('催收页面');
            $table->boolean('control')->default('0')->comment('控制台页面');
            $table->boolean('Statistics')->comment('自定义权限');
            $table->string('DB')->default('0')->comment('访问数据库');
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
        Schema::dropIfExists('user_auths');
    }
}
