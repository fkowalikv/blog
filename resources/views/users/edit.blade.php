@extends('../layout/app')

@section('title', $user->username)

@section('content')
    <section class="lajtof-section-your-profile">
        <div class="container">
            <h1 class="mt-2 text-center">
                {{ $user->username }}
            </h1>
            <div class="card my-1">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Change E-mail Address') }}</h4>
                    <form method="post" action="{{ route('users.change-email', $user) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="{{ $user->email }}">
                        </div>
                        <button class="btn btn-primary" type="submit">{{ __('Confirm') }}</button>
                    </form>
                </div>
            </div>

            <div class="card my-1">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Change password') }}</h4>
                    <form method="post" action="{{ route('users.change-password', $user) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg my-1" name="current-password" placeholder="{{ __('Current password') }}">
                            <input type="password" class="form-control form-control-lg my-1" name="new-password" placeholder="{{ __('New password') }}">
                            <input type="password" class="form-control form-control-lg my-1" name="new-password_confirmation"  placeholder="{{ __('Confirm new password') }}"/>
                        </div>
                        <button class="btn btn-primary" type="submit">{{ __('Confirm') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
