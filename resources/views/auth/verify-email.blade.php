@extends('templates.main')

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Verify Email Address</h3></div>
                                <div class="alert alert-danger m-2" role="alert">
                                    You must verify the email to access this page.
                                </div>
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="m-3">
                                        <div class="text-center"><button type="submit" class="btn btn-sm btn-primary"> Send </button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
@endsection
