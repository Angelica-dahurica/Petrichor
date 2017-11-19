<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'activity';

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_creator',
        'activity_name',
        'activity_fee',
        'activity_description',
        'activity_location',
        'activity_time',
        'activity_limitnum'
    ];

    protected $primaryKey = 'activityid';

    protected $dates = ['activity_time'];
}
