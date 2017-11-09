<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 用户存储库的实现。
     *
     * @var User
     */
    protected $users;

    /**
     * 创建新的控制器实例。
     *
     * @param  User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 显示指定用户的 profile。
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        //
    }
}
