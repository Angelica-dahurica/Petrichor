<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'group';

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
        'group_creator',
        'group_name',
        'group_createtime',
        'group_tags',
        'group_description'
    ];

    protected $primaryKey = 'groupid';

    protected $dates = ['group_createtime'];
}
