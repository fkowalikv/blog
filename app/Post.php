<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Post
 *
 * @property-read \App\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 */
class Post extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addComment($comment)
    {
        return $this->comments()->create($comment);
    }

    public function hasTag($tag)
    {
        return in_array($tag->id, $this->tags()->pluck('tags.id')->toArray());
    }

    public function getDate()
    {
        return $this->created_at->diffForHumans([
            'parts' => 1,
        ]);
    }
}
