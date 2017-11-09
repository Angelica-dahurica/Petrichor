<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = [
        'activity_creator',
        'activity_name',
        'activity_fee',
        'activity_description',
        'activity_location',
        'activity_time',
        'activity_limitnum',
        'activit_userlist'
    ];

    protected $dates = ['activity_time'];

    protected $primaryKey = ['activityid'];
}
