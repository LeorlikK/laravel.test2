<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Tag\TagRequest;

class TagCreatePostController extends BaseAdminController
{
    public function __invoke(TagRequest $request):object
    {
        return $this->tag_service->create_post($request, 'admin.tags.index');
    }
}

