@extends('../layout/app')

@section('title', __('comments.edit.title', ['username' => $comment->author->username]))

@section('content')
    <section class="lajtof-section-comments-edit">
        <div class="container">
            <form action="{{ route('comments.update', $comment) }}" method="post">
                @method('PATCH')
                @csrf

                <div class="form-group mt-2">
                    <h4 class="font-weight-bold mt-3">{{ $comment->author->username }}</h4>

                    <label for="comment" class="mt-2">{{ __('Comment') }}</label>
                    <textarea class="form-control {{ $errors->has('comment') ? 'border-danger' : '' }}" rows="8" id="comment" name="comment" required>{{ $comment->comment }}</textarea>
                </div>

                <button class="btn btn-primary" type="submit" name="button">{{ __('Submit changes') }}</button>
            </form>
        </div>
    </section>
@endsection
