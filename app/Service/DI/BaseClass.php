<?php

namespace App\Service\DI;

use App\Models\Category;
use App\Models\Post;

//class BaseClass implements BaseInterface
//{
//    public string $read;
//
//    static function static(): array
//    {
//        return [
//            'one' => 1,
//            'two' => 2,
//            'three' => 3
//        ];
//    }
//
//    public function post(): Post
//    {
//        $this->read = 'one';
//
//        return Post::first();
//    }
//
//    public function category(): Category
//    {
//        return Category::first();
//    }
//}

class One
{
    private function fn_one():int
    {
        return 1;
    }
}
class Two extends One
{
    private function fn_one():int
    {
        return 1;
    }
}
class Three extends Two
{
    private function fn_one():int
    {
        return 1;
    }

    public function ret():int
    {
        return $this->fn_one();
    }
}
