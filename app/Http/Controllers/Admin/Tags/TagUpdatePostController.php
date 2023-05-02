<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Tag\TagRequest;
use App\Models\Tag;

class TagUpdatePostController extends BaseAdminController
{
    public function __invoke(TagRequest $request, Tag $patch, $page):object
    {
        return $this->tag_service->update_post($request, $patch, 'admin.tags.index');
    }
}

