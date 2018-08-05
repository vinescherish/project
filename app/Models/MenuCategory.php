<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuCategory
 *
 * @property int $id
 * @property string $name 菜单分类名称
 * @property int $shop_id 所属商家ID
 * @property string $description 描述
 * @property string $is_selected 是否默认分类，1是，0不是
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $type_accumulation 菜单编号
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menus[] $menus
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereIsSelected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereTypeAccumulation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
