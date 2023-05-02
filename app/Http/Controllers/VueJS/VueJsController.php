<?php

namespace App\Http\Controllers\VueJS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class VueJsController extends Controller
{
    const CLASS_NAME = "posts";

    public function index()
    {
//        $array = [1,2,3,4,5,6,7,8,9,10];
//        $res = array_map(function ($arr) {
//           return $arr > 2;
//        }, $array);
//        dd($res);

//        $array = [1,2,3,4,5,6,7,8,9,10];
//        $res = array_map(fn($arr) => $arr > 2, $array);
//        dd($res);



//        $res = $this->two(10, 20);
//        dd($res);
        return view('vue-js.crud');
    }

//    function one($sum, $c)
//    {
////        dd($sum);
//        return $sum($c);
//    }
//
//    function two($a, $b)
//    {
////        return $this->one(fn($c) => $a + $b + $c, 30);
//        return $this->one(function ($c) use ($a, $b){
//            return $a + $b + $c;
//        }, 30);
//    }

//    function create()
//    {
//        try {
//            $data = [
//                'class_name' => self::CLASS_NAME,
//                'categories' => Category::all(),
//                'tags' => Tag::all(),
//            ];
//        } catch (\Exception $exception) {
//            return abort('500');
//        }
//
//        return view('vue-js.crud');
//    }
}
