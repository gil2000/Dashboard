@extends('templates.main')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1 class=" float-start">Users</h1>
            <a class="btn btn-sm btn-success float-end" href="{{ route('admin.users.create')}}">Create</a>
        </div>
    </div>



    <div class="card p-3 shadow shadow-lg" >
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="">
                        <div class="">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <form style="height: 12px" class="d-inline-block" id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
