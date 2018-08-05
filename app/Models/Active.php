<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Active
 *
 * @property int $id
 * @property string $title 活动名称
 * @property string $content 活动内容
 * @property string $start_time 活动开始时间
 * @property string $end_time 活动结束时间
 * @property string|null $active_img 活动图片
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereActiveImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Active whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Active extends Model
{

    //设置可修改字段
    public  $fillable=['title','content','start_time','end_time','active_img'];
}
