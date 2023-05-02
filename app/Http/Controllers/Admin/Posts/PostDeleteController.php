<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Post;

class PostDeleteController extends BaseAdminController
{
    public function __invoke(Post $delete):object
    {
        return $this->post_service->delete($delete);
    }
}

