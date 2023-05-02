<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Category;
use App\Models\Post;

class CategoryDeleteController extends BaseAdminController
{
    public function __invoke(Category $delete):object
    {
        return $this->category_service->delete($delete);
//        return redirect('admin.posts.all');
    }
}

