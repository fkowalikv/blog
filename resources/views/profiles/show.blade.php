@extends('../layout/app')

@section('title', $user->username)

@section('content')
    <section class="lajtof-section-posts my-1">
        <div class="container">
            {{ $user->username }}
            {{ $user->email }}
            {{ $user->last_login }}
            {{ $user->last_login_ip }}
        </div>
    </section>
@endsection
