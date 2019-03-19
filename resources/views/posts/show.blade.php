@extends('../layout/app')

@section('title', $post->title)

@section('content')
    <section class="lajtof-section-posts my-1">
        <div class="container">
            @auth
                <div class="my-1">
                    <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit" role="button">Edit</a>
                    <form class="d-inline" action="/posts/{{ $post->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                    </form>
                </div>
            @endauth

            <div class="card bg-light mb-1">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex">
                            <div class="flex-fill text-left">
                                <h4 class="font-weight-bold">
                                    {{ $post->title }}
                                </h4>
                            </div>
                            <div class="flex-fill text-right">
                                <span class="font-italic">{{ $post->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="card-text text-justify">{{ $post->description }}</p>
                </div>
            </div>

            @if ($post->comments->count())
                @foreach ($post->comments->sortByDesc('created_at') as $comment)
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-flex">
                                    <div class="flex-fill text-left">
                                        ({{ $comment->created_at }}) <span class="font-weight-bold">{{ $comment->user->username }}</span>
                                    </div>
                                    <div class="flex-fill text-right lajtof-badge">
                                        <form action="/comments/{{ $comment->id }}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <button class="btn {{ $comment->important ? 'btn-danger' : 'btn-primary' }} badge badge-pill" name="important" onclick="this.form.submit()">{{ $comment->important ? 'Important comment' : 'Comment' }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text text-justify pl-3">{{ $comment->comment }}</p>
                        </div>
                    </div>
                 @endforeach
            @endif
            @auth
                <div class="card mb-1">
                    <div class="card-body">
                        @include('partials.errors')
                        <form action="/posts/{{ $post->id }}/comments" method="post">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="comment" class="mt-3">Comment</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" rows="8" id="comment" name="comment" required></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit" name="button">Add new comment</button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </section>
@endsection
