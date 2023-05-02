<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostRequest;

class PostCreatePostController extends BaseAdminController
{
    public function __invoke(PostRequest $request):object
    {
        return $this->post_service->create_post($request, 'admin.posts.show');
    }
}

