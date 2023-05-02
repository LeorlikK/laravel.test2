<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;

class CategoryAllController extends BaseAdminController
{
    public function __invoke():object
    {
        return $this->category_service->all('admin.categories.all');
    }
}

