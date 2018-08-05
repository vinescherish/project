<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menus
 *
 * @property int $id
 * @property string $goods_name 商品名称
 * @property int $rating 评分
 * @property int $shop_id 所属商家ID
 * @property int $category_id 所属菜品分类id
 * @property float $goods_price 价格
 * @property string $discription 描述
 * @property int|null $month_sales 月销量
 * @property int|null $rating_count 评分数量
 * @property string $tips 提示信息
 * @property int|null $satisfy_count 满意度数量
 * @property float|null $satisfy_rate 满意度评分
 * @property string $goods_img 商品图片
 * @property int $status 状态，1上架，0下架
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\MenuCategory $menu
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereDiscription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereGoodsImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereMonthSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereRatingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereSatisfyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereSatisfyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereTips($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menus extends Model
{
    //
    public $fillable=['goods_name','rating','shop_id','category_id','goods_price','discription','month_sales','rating_count','tips','satisfy_count','satisfy_rate','goods_img','status'];
    //找到所属商家
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
    //找到所属菜品分类
    public function menu(){
        return $this->belongsTo(MenuCategory::class,'category_id');
    }
//    //得到用户所有菜品分类
//    public function  menusCate(){
//        return $this->hasMany(MenuCategory::class,'shop_id');
//    }

}
