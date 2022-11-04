@extends('layouts.main')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Profile</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('user-profile-information.update') }}">
                                        @csrf
                                        @method("PUT")
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" type="text" placeholder="Enter your name" value="{{ auth()->user()->name }}" />
                                                    <label for="inputName">Name</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" value="{{ auth()->user()->email }}" />
                                            <label for="inputEmail">Email address</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="text-center"><button type="submit" class="btn btn-sm btn-primary"> Update </button></div>
                                        </div>
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
