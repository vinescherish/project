<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //可修改字段
    public $fillable = ['name', 'url', 'pid', 'sort'];

    //找到下级菜单所对应的导航名
    public  function get(){
        return $this->belongsTo(Nav::class,'pid');
    }
}