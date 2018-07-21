<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    //设置可修改字段
    public  $fillable=['id','bao','piao','zhun','start_send','start_cost','notice','discount'];
}
