@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="mb-5">Outdoor Temperature</h1>
        <div class="dropdown my-2 me-3">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Time
            </button>
            <button class="btn btn-sm btn-outline-primary" type="button" id="all">
                All
            </button>
            @foreach($all as $key => $one)
                <button class="btn btn-sm btn-outline-primary" type="button" id="toggle{{$key + 1}}">
                    Station {{$key + 1}}
                </button>
            @endforeach
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-6 mt-1">
            <div class="card text-dark mb-3 shadow border border-1 border-dark">
                <h5 class="card-header">Average Outdoor Temperature</h5>
                <div class="card-body">
                    <div id="chart-timeline">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="card text-dark mb-3 shadow border border-1 border-dark">
                    <h5 class="card-header">Outdoor Temperature Range</h5>
                    <div class="card-body">
                        <div id="chart-timeline1">
                        </div>
                    </div>
            </div>
        </div>
    </div>

    @push('scripts1')
    <script>


        $("#toggle1").on("click", function() {
        chart.updateOptions({
            series: [
                {
                    name:  'Temperature Station',
                    data:  @json($all[0]['var']),
                    type: 'line'
                },
            ],
            colors: ['#f14040'],
            stroke: {
                curve: 'smooth',
                colors: ['#f14040'],
            },
        }),
          chart1.updateOptions({
              series: [
                  {
                      type: 'rangeArea',
                      name: 'Range Station 1',
                      data: [

                              @foreach($temprange[0]['range'] as $o)
                          {
                              x: @json($o['day']),
                              y: @json($o[0])
                          },
                            @endforeach
                      ]
                  },
              ],
              colors: ['#f14040']
          })
        });

        $("#toggle2").on("click", function() {
            chart.updateOptions({
                series: [
                    {
                        name:  'Temperature Station',
                        data:  @json($all[1]['var']),
                        type: 'line',
                    },
                ],
                colors: ['#89a7e8'],
                stroke: {
                    curve: 'smooth',
                    colors: ['#89a7e8'],
                },
            }),
            chart1.updateOptions({
                series: [
                    {
                        type: 'rangeArea',
                        name: 'Range Station 1',
                        data: [

                                @foreach($temprange[1]['range'] as $o)
                            {
                                x: @json($o['day']),
                                y: @json($o[0])
                            },
                            @endforeach
                        ]
                    },
                ],
                colors: ['#89a7e8'],
            })
        });

        $("#all").on("click", function() {
        chart.updateOptions({
            series: [
                    @foreach($all as $one)
                {
                    name:  'Temperature Station - {{ $one['id'] }}',
                    data:  @json($one['var']),
                    type: 'line',
                },
                    @endforeach
            ],
            colors: ['#f14040', '#89a7e8'],
            stroke: {

                curve: 'smooth',
                colors: ['#f14040', '#89a7e8'],
            },
        }),
            chart1.updateOptions({
                series: [
                        @foreach($temprange as $one)
                    {
                        type: 'rangeArea',
                        name: 'Range Station {{$one['id']}}',
                        data: [

                                @foreach($one['range'] as $o)
                            {
                                x: @json($o['day']),
                                y: @json($o[0])
                            },
                            @endforeach
                        ]
                    },
                    @endforeach
                ],
                colors: ['#f14040', '#89a7e8'],
                stroke: {

                    curve: 'smooth',
                    colors: ['#f14040', '#89a7e8'],
                },
            })
        });


        var options = {
            series: [
                    @foreach($all as $one)
                {
                    name: 'Temperature Station - {{ $one['id'] }}',
                    data:  @json($one['var']),
                    type: 'line',
                },
                     @endforeach
            ],

            chart: {
                id: 'area-datetime',
                height: 350,
                type: 'line'

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
            yaxis: {
                title: {
                    text: 'ºC',
                    style: {
                        fontWeight: 1000

                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MMM/y'
                }
            },
            legend: {
                position: 'bottom',
            },

        }

        var chart = new ApexCharts(document.querySelector("#chart-timeline"), options);
        chart.render();

      var options1 = {
          series: [
                  @foreach($temprange as $one)
              {
                  type: 'rangeArea',
                  name: 'Range Station {{$one['id']}}',
                  data: [

                          @foreach($one['range'] as $o)
                      {
                              x: @json($o['day']),
                              y: @json($o[0])
                      },
                            @endforeach
                  ]
              },
                    @endforeach
          ],

          chart: {
              id: 'area-datetime',
              height: 350,
              type: 'rangeArea'

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
          yaxis: {
              title: {
                  text: 'ºC',
                  style: {
                      fontWeight: 1000

                  }
              }
          },
          tooltip: {
              x: {
                  format: 'dd/MMM/y'
              }
          },
          legend: {
              position: 'bottom',
          },

      }

      var chart1 = new ApexCharts(document.querySelector("#chart-timeline1"), options1);
      chart1.render();


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

