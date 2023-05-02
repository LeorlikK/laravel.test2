<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;

class CategoryCreateGetController extends BaseAdminController
{
    public function __invoke():object
    {
        return $this->category_service->create_get('admin.categories.create');
    }
}

