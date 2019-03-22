@extends('../layout/app')

@section('title', __('Editing') . ' ' . $post->title)

@section('content')
    <section class="lajtof-section-posts-new">
        <div class="container">
            @include('partials.errors')
            <form action="/posts/{{ $post->id }}" method="post">
                @method('PATCH')
                @csrf

                <div class="form-group mt-2">
                    <label for="title">{{ __('Title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" type="text" id="title" name="title" value="{{ $post->title }}" required>

                    <label for="description" class="mt-3">{{ __('Description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" rows="8" id="description" name="description" required>{{ $post->description }}</textarea>

                    @if ($tags->count())
                        <span class="d-block mt-3 mb-2">{{ __('Tags') }}</span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($tags as $tag)
                                <label class="btn btn-light {{ $post->hasTag($tag) ? 'active' : '' }}" for="tag{{ $tag->id }}">
                                    <input type="checkbox" autocomplete="off" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" {{ $post->hasTag($tag) ? 'checked' : '' }}>{{ $tag->name }}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

                <button class="btn btn-primary" type="submit" name="button">{{ __('Submit changes') }}</button>
            </form>
        </div>
    </section>
@endsection
