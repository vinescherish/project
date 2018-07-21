<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('shop_category_id')->comment('店铺分类id');
            $table->string('shop_name')->comment('店铺名称');
            $table->string('shop_img')->comment('店铺图片');
            $table->float('shop_rating')->comment('评分');
            $table->boolean('brand')->comment('是否是品牌 1是 0非');
            $table->boolean('on_time')->comment('是否准时送达 1是 0非');
            $table->boolean('niao')->comment('是否蜂鸟送 1是 0非');
            $table->boolean('bao')->comment('是否买保险 1是 0非');
            $table->boolean('piao')->comment('是否买发票 1是 0非');
            $table->boolean('zhun')->comment('是否准标记 1是 0非');
            $table->decimal('start_send')->comment('起送金额');
            $table->decimal('start_cost')->comment('配送费');
            $table->string('notice')->comment('店广告');
            $table->string('discount')->comment('优惠信息');
            $table->integer('status')->comment('状态：1正常 2待审 3拒接');
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
        Schema::dropIfExists('shops');
    }
}
