@extends('../layout/app')

@section('title', 'All posts')

@section('content')
    @can ('update')
        <section class="lajtof-section-posts-control">
            <div class="container">
                <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">New post</a>
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
                                    @can ('update', $post)
                                        <div class="d-none d-sm-inline ml-2">
                                            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}" role="button">Edit</a>
                                            <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                                <div class="flex-fill text-right">
                                    <span class="font-italic">{{ $post->created_at }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="card-text text-justify">{{ $post->description }}</p>
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
