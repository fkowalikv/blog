@extends('../layout/app')

@section('title', $user->username)

@section('content')
    <section class="lajtof-section-your-profile">
        <div class="container">
            <h1 class="mt-2 text-center">
                {{ $user->username }}
            </h1>
            <a class="btn btn-primary" href="{{ route('edit.blade.php') }}">{{ __('Edit profile') }}</a>
        </div>
    </section>
@endsection
