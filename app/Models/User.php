<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name 商户账号名
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string|null $user_img 密码
 * @property int $status_user 1启用，0待审，-1禁用
 * @property int $shop_id 用户店铺ID
 * @property string|null $remember_token token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Shop $shops
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatusUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserImg($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    public $fillable = ['name', 'email', 'password', 'status_user','shop_id'];
    //找到用户旗下商家
    public function  shops(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

}
