<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    /**
     * 用户存储库的实现。
     *
     * @var User
     */
    protected $picture;

    /**
     * 创建新的控制器实例。
     *
     * @param  User $user
     * @return void
     */
    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * 首页推荐
     */
    public function index()
    {
        return Picture::all();
    }
}
