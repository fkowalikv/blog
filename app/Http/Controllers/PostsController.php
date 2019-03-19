<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('update');

        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $this->authorize('update');

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $tags = request()->input('tags');

        Post::create($attributes)->tags()->attach($tags);

        return redirect('posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $post->update($attributes);

        return redirect('posts');
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect('posts');
    }
}
