<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Post;

class PostUpdateGetController extends BaseAdminController
{
    public function __invoke(Post $item, $page):object
    {
        return $this->post_service->update_get($item, $page,'admin.posts.update');
    }
}

