<?php

namespace App\Http\Controllers\Admin\Personal;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;


class CommentController extends BaseAdminController
{
    const CLASS_NAME = 'comments';

    public function index()
    {
//        dd(auth()->user()->getAuthIdentifier());
        $data = [
            'class_name' => self::CLASS_NAME,
            self::CLASS_NAME => Comment::where('user_id', auth()->user()->getAuthIdentifier())->paginate(10)
        ];

        return view('admin.personal.comments.index', compact('data'));
    }

//    public function store(Post $item)
//    {
//        $item->userLikes()->attach(auth()->user());
//        return redirect()->route('admin.posts.like.index');
//    }
//
//    public function delete(Post $item)
//    {
//        $item->userLikes()->detach(auth()->user());
//        return redirect()->route('admin.posts.like.index');
//    }
    public function destroy(Comment $item)
    {
        try {
            $item->delete();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return redirect(request()->header('referer'));
    }
}

