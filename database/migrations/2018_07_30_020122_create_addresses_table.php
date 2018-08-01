<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('收货人姓名');
            $table->string('tel')->comment('收货人电话');
            $table->string('provence')->comment('所属省份');
            $table->string('city')->comment('所属市');
            $table->string('area')->comment('所属区');
            $table->string('detail_address')->comment('详细地址');
            $table->integer('user_id')->comment('所属用户ID');
            $table->boolean('is_default')->comment('是否默认地址,1：是，0否');
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
        Schema::dropIfExists('addresses');
    }
}
