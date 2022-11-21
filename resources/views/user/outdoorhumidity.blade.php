@extends('layouts.main')

@section('content')
    <div class="h1 justify-content-center my-3 mb-5 border border-1 rounded-3 p-3 shadow d-flex">
        <p class="my-auto me-3">Outdoor Humidity</p>
    </div>

    <div class="card text-dark mb-3 shadow">
        <div class="d-flex justify-content-between">
            <h5 class="card-header ">Outdoor Humidity</h5>
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

    @push('scripts1')
        <script>
            var options = {
                series: [
                    @foreach($all as $one)
                    {
                    name:  'Humidity station- {{ $one['id'] }}',
                    data:  @json($one['var'])
                    },
                    @endforeach
                ],

                chart: {
                    id: 'area-datetime',
                    type: 'line',
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
                    position: 'top',
                }
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

