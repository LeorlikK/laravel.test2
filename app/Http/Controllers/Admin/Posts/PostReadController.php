<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Post;

class PostReadController extends BaseAdminController
{
    public function __invoke(Post $item, $page=null):object
    {
        return $this->post_service->read($item, $page, 'admin.posts.read');
    }
}

