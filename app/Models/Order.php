<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getOrderAttribute()
    {
        $arr = [-1 => "已取消", 0 => "代付款", 1 => "待发货", 2 => "待确认", 3 => "完成"];
        return $arr[$this->order_status];//-1 0 1 2 3

    }


    //可修改字段
    public  $fillable=['user_id','shop_id','order_code','province','city','county','order_address','tel','name','order_price','order_birth_time','order_status'];

    //连表得到店铺信息
    public function  shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    //得到此订单下所有的商品
    public  function  goods(){
        return $this->hasMany(OrderGood::class,'order_id');
    }
}


