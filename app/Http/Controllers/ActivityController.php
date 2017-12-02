<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * 创建一个新的活动实例。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // 验证请求...

        $activity = new Activity();
        $activity->name = $request->name;
        $activity->save();
    }

    /**
     * 首页推荐
     */
    public function index()
    {
        return Activity::all();
    }

    /**
     * 活动列表
     */
    public function getList()
    {
        return Activity::all();
    }

    /**
     * 活动详情
     */
    public function show($id)
    {
        $activity = DB::select('select * from activity where activityid = ?', [1]);
        return $activity;
    }
}
