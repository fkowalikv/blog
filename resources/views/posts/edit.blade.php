@extends('../layout/app')

@section('title', 'Editing ' . $post->title)

@section('content')
    <section class="lajtof-section-posts-new">
        <div class="container">
            @include('partials.errors')
            <form action="/posts/{{ $post->id }}" method="post">
                @method('PATCH')
                @csrf

                <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" type="text" id="title" name="title" value="{{ $post->title }}" required>

                    <label for="description" class="mt-3">Description</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" rows="8" id="description" name="description" required>{{ $post->description }}</textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="button">Submit changes</button>
            </form>
        </div>
    </section>
@endsection
