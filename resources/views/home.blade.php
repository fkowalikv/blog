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
