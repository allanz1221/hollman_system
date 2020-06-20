@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if (session('status-danger'))
<div class="alert alert-danger">
    {{ session('status-danger') }}
</div>
@endif