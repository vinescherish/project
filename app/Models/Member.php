<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $password 用户密码
 * @property string $tel 电话号码
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property float|null $money
 * @property int|null $jifen
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereJifen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereUsername($value)
 * @mixin \Eloquent
 */
class Member extends Model
{
    //设置可修改字段
    public  $fillable=['username','password','tel','money','jifen'];

    public $hidden=['password'];
}
