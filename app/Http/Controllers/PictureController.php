<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    //
    public static function getDescrip(string $content)
    {
//        $id = DB::table('user')
//            ->select('userid', 'nickname', 'sex', 'interest', 'password', 'avatar', 'age', 'signature')
//            ->where('nickname', '=', $_COOKIE["username"])
//            ->first()->userid;

        $pictures = DB::table('picture')
            ->where('picture_description', 'like', '%'.$content.'%')
//            ->join('like_picture', 'picture.pictureid', '=', 'like_picture.pictureid')
//            ->join('user', $id, '=', 'like_picture.userid')
//            ->select('picture.pictureid', 'picture_album', 'picture_name', 'picture_description',
//                'picture_content', 'picture_publishtime', 'picture_tags')
//            ->distinct()
            ->get();
        return $pictures;
    }

    public static function getHot()
    {
        $pictures = DB::table('picture')
            ->join('like_picture', 'picture.pictureid', '=', 'like_picture.pictureid')
            ->select('picture.pictureid', 'picture_album', 'picture_name', 'picture_description',
                'picture_content', 'picture_publishtime', 'picture_tags', DB::raw('count(picture.pictureid) as num'))
            ->groupBy('picture.picture_content')
            ->orderBy('count', 'desc')
            ->get();
        return $pictures;
    }

    public static function getTags(string $tag)
    {
        $pictures = DB::table('picture')
            ->where('picture_tags', 'like', '%'.$tag.'%')
            ->get();
        return $pictures;
    }

    public static function getLike()
    {
        $id = DB::table('user')
            ->select('userid', 'nickname', 'sex', 'interest', 'password', 'avatar', 'age', 'signature')
            ->where('nickname', '=', $_COOKIE["username"])
            ->first()->userid;

        $pictures = DB::table('like_picture')
            ->join('user', $id, '=', 'like_picture.userid')
            ->join('picture', 'picture.pictureid', '=', 'like_picture.pictureid')
            ->select('picture.pictureid', 'picture_album', 'picture_name', 'picture_description',
                'picture_content', 'picture_publishtime', 'picture_tags')
            ->distinct()
            ->get();

        return $pictures;
    }

    public static function getIsLiked($id)
    {
        $userid = DB::table('user')
            ->select('userid', 'nickname', 'sex', 'interest', 'password', 'avatar', 'age', 'signature')
            ->where('nickname', '=', $_COOKIE["username"])
            ->first()->userid;

        $picture = DB::table('like_picture')
            ->where('pictureid', '=', $id)
            ->where('userid', '=', $userid)
            ->first();
        if($picture == null)
            return [
                'userid' => 0,
            ];
        else
            return [
                'userid' => $picture->userid,
                'pictureid' => $picture->pictureid,
                'like_time' => $picture->like_time,
            ];
    }
}
