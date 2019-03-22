@extends('../layout/app')

@section('title', $post->title)

@section('content')
    <section class="lajtof-section-posts my-1">
        <div class="container">
            @can ('update', $post)
                <div class="my-1">
                    <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit" role="button">{{ __('Edit') }}</a>
                    <form class="d-inline" action="/posts/{{ $post->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" name="button">{{ __('Delete') }}</button>
                    </form>
                </div>
            @endcan

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
                                <span class="font-italic">{{ $post->getDate() }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="card-text text-justify">{{ $post->description }}</p>
                    @if ($post->tags->count())
                        <span class="mr-1">{{ __('Tags') }}</span>
                        <div class="d-inline lajtof-badge">
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            @if ($post->comments->count())
                @foreach ($post->comments->sortByDesc('created_at') as $comment)
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="d-flex">
                                    <div class="flex-fill text-left">
                                        ({{ $comment->getDate() }}) <span class="font-weight-bold">{{ $comment->user->getFullName() }}</span>
                                    </div>
                                    <div class="flex-fill text-right lajtof-badge">
                                        <form action="/comments/{{ $comment->id }}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <button class="btn {{ $comment->important ? 'btn-danger' : 'btn-primary' }} badge badge-pill" name="important" onclick="this.form.submit()">{{ $comment->important ? __('Important comment') : __('Comment') }}</button>
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
                            <div class="form-group">
                                <label for="comment">{{ __('Comment') }}</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" rows="8" id="comment" name="comment" required></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit" name="button">{{ __('Add new comment') }}</button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </section>
@endsection
