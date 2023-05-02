<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostSearchFilter
{
    static function post_filter(Builder $query, $filter): object
    {
        if (isset($filter['post_search'])) {
            $query->where('title', 'like', "%{$filter['post_search']}%");
        }
        return $query;
    }
}
