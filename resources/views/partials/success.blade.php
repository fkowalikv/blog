@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-2 my-1 shadow position-fixed w-25 lajtof-alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
