<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Events\PostCommented;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $attributes = $this->validateComment();

        $attributes['author_id'] = auth()->id();

        $post->addComment($attributes);

        return back();
    }

    public function updateLike(Comment $comment)
    {
        $comment->like();

        return back();
    }

    public function edit(Comment $comment) {
        return view('comments.edit', compact('comment'));
    }

    public function update(Comment $comment) {
        $comment->update($this->validateComment());
        return redirect('posts/' . $comment->post->id)->withSuccess(__('comments.edited.success', ['username' => $comment->author->username]));
    }

    public function validateComment()
    {
        return request()->validate([
            'comment' => 'required|min:3'
        ]);
    }
}
