<?php
namespace App\Http\Controllers\Di;
use App\Http\Controllers\Controller;
use App\Service\DI\BaseClass;
use App\Service\DI\BaseClassTwo;
use App\Service\DI\BaseService;
use App\Service\DI\One;
use App\Service\DI\Three;


class DIController extends Controller
{
    public function __invoke()
    {

        $baseService = new BaseService(new BaseClassTwo());
//        $baseClass = new BaseService('lalala');
//
////        $baseClass = app( new BaseService::class, ['one']);
////        $baseClass = app('App\Service\Di\BaseService', ['one', 'two']);
//
////        dd($baseService->one());
//        $data = [
//            'static' => $baseService->service_static(),
//            'post' => $baseService->service_post(),
//            'category' => $baseService->service_category(),
//        ];
//
//        return view('di.di', compact('data'));
//        $class = new One();
        return strval(require_once __DIR__ . App\Service\DI\BaseClass);
        return $class->ret();
    }
}
