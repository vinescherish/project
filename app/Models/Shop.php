<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop
 *
 * @property int $id 主键
 * @property int $shop_category_id 店铺分类id
 * @property string $shop_name 店铺名称
 * @property string $shop_img 店铺图片
 * @property float $shop_rating 评分
 * @property int $brand 是否是品牌 1是 0非
 * @property int $on_time 是否准时送达 1是 0非
 * @property int $niao 是否蜂鸟送 1是 0非
 * @property int $bao 是否买保险 1是 0非
 * @property int $piao 是否买发票 1是 0非
 * @property int $zhun 是否准标记 1是 0非
 * @property float $start_send 起送金额
 * @property float $start_cost 配送费
 * @property string $notice 店广告
 * @property string $discount 优惠信息
 * @property int|null $status 状态：1正常，0禁用
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $user_id 商户ID
 * @property-read \App\Models\ShopCategory $shopCate
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereBao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereNiao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereOnTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop wherePiao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereStartCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereStartSend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereZhun($value)
 * @mixin \Eloquent
 */
class Shop extends Model
{
    //设置可修改字段
    public  $fillable=['shop_name','shop_category_id','shop_img','shop_rating','brand','on_time','niao','bao','piao','zhun','start_send','start_cost','notice','discount','user_id'];

    //找到当前对象的类别
    public  function shopCate(){

       return $this->belongsTo(ShopCategory::class,'shop_category_id');
    }
    //找到当前的商铺的用户
    public  function user(){
        return $this->hasOne(User::class,'shop_id');
    }
}
