<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Mail\NewPosts;

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
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $tags = request()->input('tags');

        $post = Post::create($attributes);
        $post->tags()->attach($tags);

        \Mail::to(auth()->user()->email)->send(
            new NewPosts($post)
        );

        return redirect('posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit', compact(['post', 'tags']));
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $tags = request()->input('tags');

        $post->update($attributes);
        $post->tags()->detach();
        $post->tags()->attach($tags);

        return redirect('posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('posts');
    }
}
