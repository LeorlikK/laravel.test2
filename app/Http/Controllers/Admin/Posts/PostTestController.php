<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;


class PostTestController extends BaseAdminController
{
    public function __invoke(PostSearchRequest $request, $one, $two):object
    {
        return $this->post_service->test($one, $two, $request, 'admin.posts.all');
    }
}

