<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    //
    public static function getDescrip(string $content)
    {
        $pictures = DB::table('picture')
            ->where('picture_description', 'like', '%'.$content.'%')
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
}
