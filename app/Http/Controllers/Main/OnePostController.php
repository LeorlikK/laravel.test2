<?php

namespace App\Http\Controllers\Main;

use App\Http\Requests\Main\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class OnePostController
{
    const CLASS_NAME = 'posts';
    public function show(Post $item): object
    {
        $data = [
            'class_name' => self::CLASS_NAME,
            'posts' => Post::find($item->id),
        ];

        return view('posts.one_post', compact('data'));
    }

    public function add_comment(Post $item, CommentRequest $commentRequest)
    {
        $commentRequest = $commentRequest->validated();
        Comment::create(
            [
                'comment' => $commentRequest['comment'],
                'user_id' => auth()->user()->id,
                'post_id' => $item->id
            ]);
//        $data = [
//            'class_name' => self::CLASS_NAME,
//            ''
//        ];
        return redirect(request()->header('referer'));
    }
}
