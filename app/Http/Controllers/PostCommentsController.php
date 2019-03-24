<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'comment' => 'required|min:3'
        ]);

        $attributes['author_id'] = auth()->id();

        $post->addComment($attributes);

        return back();
    }

    public function update(Comment $comment)
    {
        $method = $comment->important ? 'markNotImportant' : 'markImportant';

        $comment->$method();

        return back();
    }
}
