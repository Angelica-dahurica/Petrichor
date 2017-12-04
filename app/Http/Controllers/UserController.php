<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function create(Request $request)
    {
        $id = DB::table('user')
            ->insertGetId([
                'nickname' => $request->nickname,
                'sex' => $request->sex,
                'interest' => $request->interest,
                'password' => encrypt($request->password),
                'avatar' => $request->avatar,
                'age' => $request->age,
                'signature' => $request->signature
            ]);
        $user = DB::table('user')
            ->where('userid', '=', $id)
            ->first();
        return $user;
    }

    public static function verify(Request $request)
    {
        $user = DB::table('user')
            ->select('userid', 'nickname', 'sex', 'interest', 'password', 'avatar', 'age', 'signature')
            ->where('nickname', '=', $request->nickname)
            ->first();
        if(decrypt($user->password)==$request->password)
            return $user;
        else
            return null;
    }
}
