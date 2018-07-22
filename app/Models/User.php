<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public $fillable = ['name', 'email', 'password', 'status_user'];
    //找到用户旗下商家
    public function  shops(){
        return $this->hasOne(Shop::class);
    }

}
