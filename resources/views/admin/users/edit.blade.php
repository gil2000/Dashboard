@extends('layouts.main')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                   <div class="d-flex">
                                       <h3 class="mt-2 ms-2">Edit User</h3>
                                       <a href="{{ route('admin.users.index') }}" class="ms-auto"> <i class="fa-regular fa-circle-left fa-xl "></i> </a>
                                   </div>
                                </div>

                                <div class="card-body pt-2">
                                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                        @method('PATCH')
                                        @include('admin.users.partials.form')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
