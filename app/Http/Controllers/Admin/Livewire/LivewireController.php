<?php

namespace App\Http\Controllers\Admin\Livewire;

use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Requests\Admin\Post\PostSearchRequest;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LivewireController extends BaseAdminController
{
    public function index()
    {
        return view('admin.livewire.all');
    }
}

