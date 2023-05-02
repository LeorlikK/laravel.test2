<?php

namespace App\Http\Controllers\Admin;

class AdminIndexController extends BaseAdminController
{
    public function __invoke(): object
    {
        return view('admin.index.index');
    }
}
