<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Tag;

class TagUpdateGetController extends BaseAdminController
{
    public function __invoke(Tag $item, $page):object
    {
        return $this->tag_service->update_get($item, $page,'admin.tags.update');
    }
}

