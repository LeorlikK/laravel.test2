<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLikes;
use App\Models\User;

class PostLikeController extends BaseAdminController
{
    const CLASS_NAME = 'likes';

    public function index()
    {
        $data = [
            'class_name' => self::CLASS_NAME,
            self::CLASS_NAME => auth()->user()->postLikes()->withCount('userLikes')->orderBy('user_likes_count', 'DESC')->paginate(10),
//            self::CLASS_NAME => Post::all()
//            self::CLASS_NAME => auth()->user()->withCount('postLikes')->orderBy('post_likes_count', 'DESC')->paginate(10)
//            self::CLASS_NAME => auth()->user()->withCount('postLikes')->where('id', auth()->user()->getAuthIdentifier())->paginate(10)
//            self::CLASS_NAME => PostUserLikes::where('user_id', auth()->user()->getAuthIdentifier())->get()
        ];

//        dd($data[$data['class_name']]);
        return view('admin.personal.likes.index', compact('data'));
    }

    public function store(Post $item)
    {
        $item->userLikes()->toggle(auth()->user());
//        $item->userLikes()->attach(auth()->user());
//        return redirect(request()->header('referer'));
        return redirect()->back();
    }

    public function delete(Post $item)
    {
        $item->userLikes()->detach(auth()->user());
        return redirect()->route('admin.posts.like.index');
    }
}

