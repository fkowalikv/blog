@extends('../layout/app')

@section('title', __('All posts'))

@section('content')
    @can ('update')
        <section class="lajtof-section-posts-control">
            <div class="container">
                <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">{{ __('New post') }}</a>
            </div>
        </section>
    @endcan
    @foreach($posts as $post)
        <section class="lajtof-section-posts mt-1">
            <div class="container">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex">
                                <div class="flex-fill text-left">
                                    <h4 class="d-inline font-weight-bold text-decoration-none">
                                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h4>
                                    <h6 class="d-inline">
                                        {{ __('by') . ' ' . $post->author->username }}
                                    </h6>
                                </div>
                                <div class="flex-fill text-right">
                                    <span class="font-italic">{{ $post->getDate() }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="card-text text-justify">{{ strip_tags($post->description) }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <section>
        <div class="container">
            {{ $posts->links() }}
        </div>
    </section>

@endsection
