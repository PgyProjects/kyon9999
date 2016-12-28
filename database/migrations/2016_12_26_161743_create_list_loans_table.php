<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_loans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('Admin_users_id')->comment('审核员ID');
            $table->integer('Customers_id')->comment('用户ID');
            $table->string('money')->comment('借出金额');
            $table->string('out_time')->comment('借出日期');
            $table->string('back_time')->comment('合同还款日期');
            $table->string('get_time')->comment('实际还款日期');
            $table->integer('status')->comment('借款状态 0借出,1已还,2逾期');
            $table->integer('cates')->comment('借款类型');
            $table->integer('delay_days')->comment('逾期天数');
            $table->integer('delay_fee')->comment('逾期费用');
            $table->integer('back_way')->nullable()->comment('还款渠道');
            $table->integer('remain')->nullable()->comment('剩余需还金额');
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
        Schema::dropIfExists('list_loans');
    }
}
