@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mx-2 my-1 shadow position-fixed d-flex lajtof-alert">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mx-2 my-1 shadow position-fixed d-flex lajtof-alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
