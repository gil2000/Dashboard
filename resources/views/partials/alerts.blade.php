@if(session('sucess'))
    <div class="alert alert-success" role="alert">
        {{ session('sucess') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
