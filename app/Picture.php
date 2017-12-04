<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'picture';

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
        'picture_album',
        'picture_name',
        'picture_description',
        'picture_content',
        'picture_publishtime',
        'picture_tags'
    ];

    protected $primaryKey = 'pictureid';

    protected $dates = ['picture_publishtime'];
}
