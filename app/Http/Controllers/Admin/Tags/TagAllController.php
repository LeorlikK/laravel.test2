<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Admin\BaseAdminController;

class TagAllController extends BaseAdminController
{
    public function __invoke():object
    {
        return $this->tag_service->all("admin.tags.all");
    }
}



