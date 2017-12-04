<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'album';

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
        'album_creator',
        'album_name',
        'album_description',
        'album_picturelist',
        'album_createtime',
        'album_tags'
    ];

    protected $primaryKey = 'albumid';

    protected $dates = ['album_createtime'];
}
