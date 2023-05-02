<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Tag;

class TagDeleteController extends BaseAdminController
{
    public function __invoke(Tag $delete):object
    {
        return $this->tag_service->delete($delete);
//        return redirect('admin.posts.all');
    }
}

