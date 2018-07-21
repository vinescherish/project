<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public $fillable = ['name', 'email', 'password', 'status', 'status_user', 'shop_id'];
    //找到所属商家
    public function  getShop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

}
