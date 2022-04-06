@extends('templates.main')

@section('content')

    <h1 class="mb-3">Edit new user</h1>

    <div class="card p-4 shadow shadow-lg">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @method('PATCH')
            @include('admin.users.partials.form')
        </form>
    </div>
@endsection
