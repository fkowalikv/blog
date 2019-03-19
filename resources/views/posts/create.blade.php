@extends('../layout/app')

@section('title', 'Create a new post')

@section('content')
    <section class="lajtof-section-posts-new">
        <div class="container">
            @include('partials.errors')
            <form action="/posts" method="post">
                @csrf
                <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input class="form-control w-25 {{ $errors->has('title') ? 'border-danger' : '' }}" type="text" id="title" name="title" value="{{ old('title') }}" required>

                    <label for="description" class="mt-3">Description</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" rows="8" id="description" name="description" required>{{ old('description') }}</textarea>

                    @foreach ($tags as $tag)
                        <label for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                        <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    @endforeach
                </div>
                <button class="btn btn-primary" type="submit" name="button">Add new post</button>
            </form>
        </div>
    </section>
@endsection
