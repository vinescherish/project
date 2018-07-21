<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //设置可修改字段
    public  $fillable=['name','shop_category_id','shop_name','shop_img','shop_rating','brand','on_time','niao','status'];

    //找到当前对象的类别
    public  function shopCate(){

       return $this->belongsTo(ShopCategory::class,'shop_category_id');
    }
    //找到当前的详情信息
    public  function shopInfo(){
        return $this->hasOne(ShopInfo::class,'id');
    }
}
