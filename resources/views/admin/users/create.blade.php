@extends('templates.main')

@section('content')

    <h1 class="mb-3"> Create new user</h1>

    <div class="card p-4 shadow shadow-lg">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @include('admin.users.partials.form', ['create' => true])
        </form>
    </div>
@endsection
