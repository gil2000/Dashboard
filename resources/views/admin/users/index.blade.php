@extends('templates.main')

@section('content')

    <div class="container mb-5">
        <nav class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-1">
                <li class="breadcrumb-item active" aria-current="page">Users Management</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="card shadow" style=" box-shadow: inset 0 0 0 200px rgba(255,255,255,0.5); ">
            <div class="card-header">Users
                <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-sm btn-outline-dark float-end">Create </a>
            </div>
            <div class="card-body overflow-hidden">
                <form class="m-2 border border-dark" action="" method="GET">
                    <div class="input-group input-group-navbar">
                        <input type="text" name='search' class="form-control" placeholder="Procurar…" aria-label="Search">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-user"></i> Name</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-at"></i> Email</th>
                        <th class="d-none d-sm-table-cell" scope="col"><i class="fas fa-user-tag"></i> Role(s)</th>
                        <th class="d-none d-lg-table-cell" scope="col"><i class="fas fa-calendar-alt"></i> Date</th>
                        <th class="text-center" scope="col"><i class="fas fa-edit"></i> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)

                            <tr>
                                <th class="align-middle" scope="row">{{ $key +1 }}</th>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle d-none d-md-table-cell">{{ $user->email }}</td>
                                <td class="align-middle d-none d-sm-table-cell">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td class="align-middle d-none d-lg-table-cell">{{ $user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"> <button type="button" class="btn btn-sm btn-primary m-1"><i class="fas fa-pen"></i></button> </a>
                                        <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="post" class="">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users-> links() }}
            </div>
        </div>
    </div>


@endsection
