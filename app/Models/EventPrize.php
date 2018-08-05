<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrize extends Model
{
    //设置可更改字段
    public  $fillable=['event_id','name','description','user_id'];

    //所属抽奖活动
    public  function  event(){
        return $this->belongsTo(Event::class,'event_id');
    }

    //所得用户
    public  function  user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
