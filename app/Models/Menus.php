<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
