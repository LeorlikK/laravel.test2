<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;


class PostAllController extends BaseAdminController
{
    public function __invoke(PostSearchRequest $request):object
    {
        return $this->post_service->all($request, 'admin.posts.all');
    }
}

