<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $name 收货人姓名
 * @property string $tel 收货人电话
 * @property string $provence 所属省份
 * @property string $city 所属市
 * @property string $area 所属区
 * @property string $detail_address 详细地址
 * @property int $user_id 所属用户ID
 * @property int $is_default 是否默认地址,1：是，0否
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereDetailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereProvence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereUserId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    //设置可修改字段
    public $fillable=['name','tel','provence','city','area','detail_address','user_id','is_default'];


}

