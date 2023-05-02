<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Category;

class CategoryReadController extends BaseAdminController
{
    public function __invoke(Category $item, $page):object
    {
        return $this->category_service->read($item, $page, 'admin.categories.read');
    }
}

