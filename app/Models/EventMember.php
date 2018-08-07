<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    //设置可修改字段
    public  $fillable=['event_id','user_id'];
}
