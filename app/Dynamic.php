<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'dynamic';

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
        'dynamic_creator',
        'dynamic_type',
        'dynamic_repost',
        'dynamic_like',
        'dynamic_content',
        'dynamic_publishtime',
        'dynamic_tags'
    ];

    protected $primaryKey = 'dynamicid';

    protected $dates = ['dynamic_publishtime'];
}
