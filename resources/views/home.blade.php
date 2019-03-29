@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Information</div>
                    @auth
                        <div class="card-body">
                            <p>Hello {{ Auth::user()->username }}</p>
                            <p>Last login: {{ Auth::user()->last_login }}</p>
                            <p>Last login IP: {{ Auth::user()->last_login_ip }}</p>
                        </div>

                        @if(Auth::user()->unreadNotifications()->count())
                            <div class="card-body">
                                <p class="font-weight-bold">New notifications</p>
                                @foreach (Auth::user()->unreadNotifications as $notification)
                                    <div class="">
                                        <a href="{{ route('posts.show', $notification->data['post_id']) }}">{{ $notification->data['author'] }} commented on your post {{ $notification->created_at->diffForHumans(['parts' => 1]) }}</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endauth

                    @guest
                        <div class="card-body">
                            Hello world!
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection
