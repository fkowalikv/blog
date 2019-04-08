@extends('../layout/app')

@section('title', $user->username)

@section('content')
    <section class="lajtof-section-your-profile">
        <div class="container">
            <div class="d-flex align-items-center">
                <h1 class="my-2">
                    {{ $user->username }}
                </h1>
                <div class="mx-2">
                    @foreach ($user->getRoleNames() as $role)
                        <span class="badge badge-primary mx-1 lajtof-badge">{{ $role }}</span>
                    @endforeach
                </div>
            </div>

            <ul class="list-group mt-2 m-sm-0">
                <li class="list-group-item"><span class="font-weight-bold">{{ __('E-mail Address') }}: </span>{{ $user->email }}</li>
            </ul>

            @can('update', $user)
                <div class="d-flex justify-content-center my-1">
                    <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">{{ __('Edit profile') }}</a>
                </div>
            @endcan
        </div>
    </section>
@endsection
