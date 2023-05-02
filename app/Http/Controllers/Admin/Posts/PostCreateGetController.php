<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;

class PostCreateGetController extends BaseAdminController
{
    public function __invoke():object
    {
        return $this->post_service->create_get('admin.posts.create');
    }
}

