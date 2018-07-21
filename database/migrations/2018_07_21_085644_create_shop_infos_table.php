<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->comment('商家ID');
            $table->boolean('bao')->comment('是否买保险 1是 0非');
            $table->boolean('piao')->comment('是否买发票 1是 0非');
            $table->boolean('zhun')->comment('是否准标记 1是 0非');
            $table->decimal('start_send')->comment('起送金额');
            $table->decimal('start_cost')->comment('配送费');
            $table->string('notice')->comment('店广告');
            $table->string('discount')->comment('优惠信息');
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
        Schema::dropIfExists('shop_infos');
    }
}
