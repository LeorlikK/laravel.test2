<?php
namespace  App\Service\DI;

use App\Models\Category;
use App\Models\Post;

interface BaseInterface
{
    const ONE = 10;

    static function static(): array;

    public function post(): Post;

    public function category(): Category;
}

//+++abstract
//+++interface
//+++app()->build()
//+++trait
//+++throw
//+++readonly    call_user_func(array('App\Models\SmsOrder', ''))
//+++event listener observer
//+++when()
//+++http_build_query
//+++load add
//+++blade -> ()
//police
//resource
//DI
//
//DB
