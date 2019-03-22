@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Information</div>
                    @auth
                        <div class="card-body">
                            Hello {{ Auth::user()->username }}!
                            {{ Auth::user()->email }}
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
