<?php
/**
 * Created by PhpStorm.
 * User: txin15
 * Date: 2017/11/19
 * Time: 0:11
 */

namespace App\Api\Transformer;

use App\Activity;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
{
    public function transform(Activity $activity)
    {
        return [
            'activity_creator' => $activity['activity_creator'],
            'activity_name' => $activity['activity_name'],
            'activity_time' => $activity['activity_time']
        ];
    }
}