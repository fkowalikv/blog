<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function markImportant()
    {
        $this->update(['important' => true]);
    }

    public function markNotImportant()
    {
        $this->update(['important' => false]);
    }

    public function getDate()
    {
        return $this->created_at->diffForHumans([
            'parts' => 2,
        ]);
    }
}
