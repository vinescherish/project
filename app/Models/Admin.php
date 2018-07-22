<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{

    //设置可修改字段
    public  $fillable=['name','email','password','admin_img','status','status_admin'];
//    //找到到当前用户的商家信息
//    public  function getShop(){
//        return $this->hasOne(Shop::class,'id');
//    }
//    //找到到当前用户的商家信息
//    public function getShopInfo(){
//        return $this->hasOne(ShopInfo::class,'id');
//    }
}
