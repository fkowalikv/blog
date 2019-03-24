<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
        $this->comments()->create($comment);
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
