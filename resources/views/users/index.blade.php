@extends('../layout/app')

@section('title', __('All posts'))

@section('content')
    <section class="lajtof-section-posts mt-1">
        <div class="container">
            <input type="text" class="form-controller mb-1" id="search" name="search" autocomplete="off"></input>

            <div class="table-responsive">
                <table class="table table-bordered table-striped rounded-1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Username') }}</th>
                            <th>{{ __('E-mail Address') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="lajtof-section-pagination">
        <div class="container">
            {{ $users->links() }}
        </div>
    </section>
@endsection
