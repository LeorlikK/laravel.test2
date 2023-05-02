<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostRequest;
use App\Models\Post;

class PostUpdatePostController extends BaseAdminController
{
    public function __invoke(PostRequest $request, Post $patch, $page):object
    {
        return $this->post_service->update_post($request, $patch, 'admin.posts.update');
    }
}

