<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $shop_id 商家id
 * @property string $order_code 订单编号
 * @property string $province 省
 * @property string $city 市
 * @property string $county 县
 * @property string $order_address 详细地址
 * @property string $tel 收货人电话
 * @property string $name 收货人姓名
 * @property float $order_price 价格
 * @property string|null $out_trade_no 微信支付
 * @property string|null $order_birth_time 下单时间
 * @property int $status 状态-1:已取消，0：代支付，1：待发货，2待确认。3：完成
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $order_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderGood[] $goods
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderBirthTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOutTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    public function getOrderStatusAttribute()
    {
        $arr = [-1 => "已取消", 0 => "代付款", 1 => "待发货", 2 => "待确认", 3 => "完成"];
        return $arr[$this->status];//-1 0 1 2 3

    }


    //可修改字段
    public  $fillable=['user_id','shop_id','order_code','province','city','county','order_address','tel','name','order_price','order_birth_time','status'];

    //连表得到店铺信息
    public function  shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    //得到此订单下所有的商品
    public  function  goods(){
        return $this->hasMany(OrderGood::class,'order_id');
    }
}


