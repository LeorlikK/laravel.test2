<?php
namespace App\Http\Controllers\Di;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DB;

class TestController extends Controller
{
    public function index(): object
    {
//        $array = ['post' => [1,2,3]];
//        $data = $array;
//        $data['api_key'] = 'key-key';
//        $data['action'] = 'action-key';
////        dd($data);
//        $http = http_build_query([
//            'one' => '111',
//            'two' => '222',
//            'three' => '333',
//        ]);



//        $role = request()->input('lala');
////        $role = 'lala';
//        $users = DB::table('users')
//            ->when($role, function ($query, $role) {
//                $query->where('id', 8);
//            })
//            ->get();
//
//
//        $users->when(true, function ($users) {
//            return $users->push(4);
//        });
//
//        $arr = collect();
//        foreach ($users as $user) {
//            $arr->add([
//                'one' => 111,
//                'two' => 222,
//                'three' => 333,
//            ]);
//        }
//
//        dd($arr);

//        $post = Post::first();
//        $post->load('post_comment');
//        $post->wit
//        dd($post);
//        \Illuminate\Support\Facades\DB::
        $post = Post::first();
//        dd($post);
        return view('di.index', compact('post'));
    }
}
