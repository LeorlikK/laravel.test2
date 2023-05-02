<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $created_at
 */
class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $guarded = [];

    public function getCarbonDateAttribute(): Carbon
    {
        return Carbon::parse($this->created_at);
    }

    public function comment_post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function comment_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
