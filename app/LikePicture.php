<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePicture extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'like_picture';

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
        'userid',
        'pictureid',
        'like_time'
    ];

    protected $primaryKeys = ['userid', 'pictureid'];

    protected $dates = ['like_time'];

}
