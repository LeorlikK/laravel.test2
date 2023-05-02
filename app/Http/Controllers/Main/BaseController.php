<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __invoke(): object
    {
        $data = [
            'posts' => Post::paginate(3)
        ];
        return view('posts.all_posts', compact('data'));
    }
}
