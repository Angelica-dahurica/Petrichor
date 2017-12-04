<?php

namespace App\Providers;

class Activity extends \Faker\Provider\Base
{
    protected static $activityList = array(
        '游园', '听音乐会', '看电影', '摄影比赛',
        '自驾游', '手工', '摄影心得交流', '摄影技术分享',
    );

    /**
     * @example 'Tag'
     * @return string
     */
    public static function activity()
    {
        return static::randomElement(static::$activityList);
    }
}
