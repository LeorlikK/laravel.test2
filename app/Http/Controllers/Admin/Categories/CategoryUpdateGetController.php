<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Category;
use App\Models\Post;

class CategoryUpdateGetController extends BaseAdminController
{
    public function __invoke(Category $item, $page):object
    {
        return $this->category_service->update_get($item, $page,'admin.categories.update');
    }
}

