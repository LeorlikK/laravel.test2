<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\Category;
use App\Models\Post;

class CategoryUpdatePostController extends BaseAdminController
{
    public function __invoke(CategoryRequest $request, Category $patch, $page):object
    {
        return $this->category_service->update_post($request, $patch, 'admin.categories.all');
    }
}

