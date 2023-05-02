<?php

namespace App\Service\DI;

use App\Models\Category;
use App\Models\Post;

class BaseClassTwo implements BaseInterface
{
    public string $read;

    static function static(): array
    {
        return [
            'one' => 10,
            'two' => 20,
            'three' => 30
        ];
    }

    public function post(): Post
    {
        $this->read = 'one';

        return Post::find(5);
    }

    public function category(): Category
    {
        return Category::find(2);
    }
}
