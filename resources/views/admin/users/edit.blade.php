@extends('layouts.main')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-1">Edit User</h3></div>
                                <div class="card-body p-5">
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
