<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Auth;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $tags = request()->input('tags');

        $attributes = $this->validatePost();
        $attributes['author_id'] = auth()->id();

        $post = Post::create($attributes);
        $post->tags()->attach($tags);

        return redirect('posts');
    }

    public function show(Post $post)
    {
        if (Auth::user()) Auth::user()->markNotificationsAsRead($post);

        $comments = $post->comments()->orderBy('created_at', 'desc')->paginate(3);
        return view('posts.show', compact(['post', 'comments']));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit', compact(['post', 'tags']));
    }

    public function update(Post $post)
    {
        $tags = request()->input('tags');

        $post->update($this->validatePost());
        $post->tags()->detach();
        $post->tags()->attach($tags);

        return redirect('posts' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('posts');
    }

    public function validatePost()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}
