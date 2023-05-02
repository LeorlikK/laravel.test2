<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Category\CategoryRequest;

class CategoryCreatePostController extends BaseAdminController
{
    public function __invoke(CategoryRequest $request):object
    {
        return $this->category_service->create_post($request, 'admin.categories.all');
    }
}

