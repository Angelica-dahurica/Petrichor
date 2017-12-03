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
}
