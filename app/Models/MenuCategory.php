<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{

public $fillable=['name','menu_id','shop_id','description','is_selected'];
    //找到所属所属商家
    public function shop(){
        return $this->belongsTo(Shop::class);

    }
    //找到对应的菜品名称
    public  function menus(){
       return $this->hasMany(Menus::class,'category_id');
    }
}
