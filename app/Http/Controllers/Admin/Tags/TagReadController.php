<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Tag;

class TagReadController extends BaseAdminController
{

    public function __invoke(Tag $item, $page):object
    {
        return $this->tag_service->read($item, $page, 'admin.tags.read');
    }
}

