@extends('layouts.main')

@section('content')
    <h1 class="mb-5">Outdoor Temperature</h1>

    <div class="row">
{{--        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title m-0 me-2">Min. Temperature</h4>
                </div>
                <div class="card-body text-center">
                    <div class="avatar avatar-md border-5 border-light-info rounded-circle mx-auto mb-4">
                        <span class="avatar-initial rounded-circle bg-label-info"><i class="bx bx-dollar bx-sm"></i></span>
                    </div>
                    <h3 class="card-title mb-1 me-2">$1,271</h3>
                    <small class="d-block mb-2">34% of target</small>
                    <span class="text-danger">-23% <i class="bx bx-chevron-down"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title m-0 text-center">Max. Temperature</h4>
                </div>
                <div class="card-body text-center">
                    <div class="avatar avatar-md border-5 border-light-info rounded-circle mx-auto mb-4">
                        <span class="avatar-initial rounded-circle bg-label-info">   <i class="fa-solid fa-temperature-three-quarters fa-xl"></i></span>
                    </div>
                    <h3 class="card-title mb-1 me-2">Valor º</h3>
                    <small class="d-block mb-2">Data</small>
                    <span class="text-danger">-23% <i class="bx bx-chevron-down"></i></span>
                </div>
            </div>
        </div>--}}
        <div class="col-md-12 mt-3">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">Outdoor Temperature</h5>
                    <div class="dropdown my-auto me-3">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Time
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a id="one_month" class="dropdown-item">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last 6 Months</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            <a class="dropdown-item" href="javascript:void(0);">All</a>
                        </div>
                    </div>
                </div>
                <div id="chart-timeline" class="card-body">
                </div>
            </div>
        </div>
    </div>


    @push('scripts1')
    <script>
        var options = {
            series: [
                    @foreach($all as $one)
                {
                    name:  'Temperature Station - {{ $one['id'] }}',
                    data:  @json($one['var']),
                    type: 'bar',
                },
                    @endforeach
                    @foreach($all as $one)
                {
                    name:  'Temperature Max by Day',
                    data:  @json($one['max']),
                    type: 'line',
                },
                    @endforeach
                    @foreach($all as $one)
                {
                    name:  'Temperature Min by Day',
                    data:  @json($one['min']),
                    type: 'line',
                },
                @endforeach
            ],

            chart: {
                id: 'area-datetime',
                height: 350,

            },
            dataLabels: {
                enabled: false
            },
            colors: ['#f14040', '#89a7e8'],
            stroke: {

                curve: 'smooth',
                colors: ['#f14040', '#89a7e8'],
            },
            xaxis: {
                type: 'datetime',
                tickAmount: 6,
            },
            tooltip: {
                x: {
                    format: 'dd/MMM/y'
                }
            },
            legend: {
                position: 'bottom',
            },

        };

        var chart = new ApexCharts(document.querySelector("#chart-timeline"), options);
        chart.render();


        var resetCssClasses = function(activeEl) {
            var els = document.querySelectorAll('button')
            Array.prototype.forEach.call(els, function(el) {
                el.classList.remove('active')
            })

            activeEl.target.classList.add('active')
        }

        document
            .querySelector('#one_month')
            .addEventListener('click', function(e) {
                resetCssClasses(e)

                chart.zoomX(

                )
            })

        document
            .querySelector('#six_months')
            .addEventListener('click', function(e) {
                resetCssClasses(e)

                chart.zoomX(

                )
            })

        document
            .querySelector('#one_year')
            .addEventListener('click', function(e) {
                resetCssClasses(e)
                chart.zoomX(

                )
            })


        document.querySelector('#all').addEventListener('click', function(e) {
            resetCssClasses(e)

            chart.zoomX(

            )
        })

    </script>
    @endpush
@endsection

