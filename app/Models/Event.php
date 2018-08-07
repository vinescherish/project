<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //设置可更改字段
    public  $fillable=['title','content','start_time','end_time','prize_time','num','is_prize'];
    //得到此活动下所有奖品
    public  function  prizes(){
        return $this->hasMany(EventPrize::class,'event_id');
    }
    //得到此活动所报名的商家id
    public  function eventUser(){
        return $this->hasMany(EventMember::class,'event_id');
    }
}
