<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLikes extends Model
{
    use HasFactory;

    public $table = 'post_user_likes';
    public $guarded = [];
}
