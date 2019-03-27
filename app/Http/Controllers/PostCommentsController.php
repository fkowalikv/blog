<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Events\PostCommented;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $attributes = request()->validate([
            'comment' => 'required|min:3'
        ]);

        $attributes['author_id'] = auth()->id();

        $comment = $post->addComment($attributes);

        event(new PostCommented($comment));

        return back();
    }

    public function update(Comment $comment)
    {
        $method = $comment->important ? 'markNotImportant' : 'markImportant';

        $comment->$method();

        return back();
    }
}
