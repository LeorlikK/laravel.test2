<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tag
 * @property-read int|null $tag_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = [];

    public function all_like(): int
    {
        return $this->userLikes()->count();
    }

    public function getCarbonDateAttribute(): Carbon
    {
        return Carbon::parse($this->created_at);
    }

    public function scopeStatusAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function getDataFullStringAttribute(): string
    {
        $string = "";
        foreach ($this->data as $key => $value) {
            $string .= "$key: $value";
            if ($key !== array_key_last($this->data)) $string .= '; ';
        }
        return $string;
    }

    protected $withCount = ['userLikes', 'category'];
//    protected $with = ['category', 'userLikes', 'post_comment'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function userLikes()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function post_comment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
