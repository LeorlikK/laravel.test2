<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;

class TagCreateGetController extends BaseAdminController
{
    public function __invoke():object
    {
        return $this->tag_service->create_get('admin.tags.create');
    }
}

