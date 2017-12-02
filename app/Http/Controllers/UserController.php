<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
     * 根据id查询用户
     *
     * @return Response
     */
    public function insert()
    {
        $users = DB::insert('insert into user values (?, ?, ?, ?, ?, ?, ?, ?)', [1]);
        return view('user.index', ['users' => $users]);
    }

    /**
     * 根据id查询用户
     *
     * @return Response
     */
    public function delete()
    {
        $users = DB::delete('delete from users where userid = ?', [1]);
        return view('user.index', ['users' => $users]);
    }

    /**
     * 根据id查询用户
     *
     * @return Response
     */
    public function update()
    {
        $users = DB::update('update users set votes = 100 where name = ?', [1]);
        return view('user.index', ['users' => $users]);
    }

    /**
     * 根据id查询用户
     *
     * @return Response
     */
    public function query($id)
    {
        $users = DB::select('select * from users where userid = ?', $id);
        return view('user.index', ['users' => $users]);
    }

    /**
     * 根据id查询用户
     *
     * @return Response
     */
    public function index(Requset $request)
    {
        $users = DB::select('select * from users where userid = ?', [1]);
        return view('user.index', ['users' => $users]);
    }

    public static function create(Request $request){
        $id = DB::table('user')->insertGetId([
            'nickname' => $request->name,
            'sex' => $request->sex,
            'interest' => $request->interest,
            'password' => $request->pwd,
            'age' => $request->age
        ]);
    }

    public static function valid(array $data){
        $user = DB::table('user')->select('nickname', 'password')
            ->where('nickname', '==', $data['nickname'])
            ->where('password', '==', $data[1]);
        if($user==null) return false;
        else return true;
    }
}
