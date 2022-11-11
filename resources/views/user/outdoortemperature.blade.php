@extends('layouts.main')

@section('content')
    <div class="h1 justify-content-center my-3 mb-5 border border-1 rounded-3 p-3 shadow d-flex">
        <p class="my-auto me-3">Outdoor Temperature</p>
        <div class="dropdown my-auto me-3">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Station
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">

            </div>
        </div>
    </div>

    <div class="card text-dark mb-3 shadow">
        <div class="d-flex justify-content-between">
            <h5 class="card-header ">Outdoor Temperature</h5>
            <div class="dropdown my-auto me-3">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Last Values
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                    <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="myChart1" height="80"></canvas>
        </div>
    </div>


    @push('scripts1')
    <script>


    </script>
    @endpush
@endsection

