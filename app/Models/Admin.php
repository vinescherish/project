<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name 商户账号名
 * @property string $email 邮箱
 * @property string $password 密码
 * @property string|null $admin_img 头像
 * @property int $status 1启用，0禁用
 * @property int $status_admin 1管理员，0不是管理员
 * @property string|null $remember_token token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereAdminImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereStatusAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{

    //设置可修改字段
    public  $fillable=['name','email','password','admin_img','status','status_admin'];
//引入

    use HasRoles;
    protected $guard_name = 'admin'; // 使用任何你想要的守卫

}
