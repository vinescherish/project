<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopCategory
 *
 * @property int $id
 * @property string $name 商品分类名称
 * @property string $img 分类图片
 * @property int $status 1显示，0隐藏
 * @property int $sort 排列顺序序
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShopCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShopCategory extends Model
{
    //设置可修改字段
    public  $fillable=['name','status','img','sort'];
}
