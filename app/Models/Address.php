<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //设置可修改字段
    public $fillable=['name','tel','provence','city','area','detail_address','user_id','is_default'];


}

