<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Service\CategoryService;
use App\Service\PostService;
use App\Service\TagService;
use App\Service\UserService;


class BaseAdminController extends Controller
{
    public PostService $post_service;
    public CategoryService $category_service;
    public TagService $tag_service;
    public UserService $user_service;

    public function __construct()
    {
        $this->post_service = new PostService;
        $this->category_service = new CategoryService;
        $this->tag_service = new TagService;
//        PostService $post_service
    }
}
