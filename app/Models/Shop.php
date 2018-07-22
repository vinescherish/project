<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(User::class,'user_id');
    }
}
