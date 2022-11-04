@extends('layouts.main')

@section('content')
    <div class="">
        <h1 class="text-center my-3 mb-5 border border-1 rounded-3 p-3 shadow">
            Dashboard {{\Illuminate\Support\Carbon::today()->toDateString()}}
            <div class="dropdown my-auto me-3">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Station
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                    @foreach($stations as $station)

                        <a class="dropdown-item @if(Request::is('dashboard/'.$station->id) == $station->id) active @else '' @endif"
                           href="{{ route('dashboard', $station->id) }}">{{ $station->nomeEstacao }}</a>

                    @endforeach
                </div>
            </div>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row h-100">
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Outdoor Temperature</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg01Values->last()->outdoortemperature }}
                                        °</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small
                                        class="@if($tendency > 0) text-success @else text-danger @endif">({{ $tendency }}
                                        %)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded">
                 <i class="fa-solid fa-temperature-three-quarters   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Outdoor Humidity</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg01Values->last()->outdoorhumidity }}
                                        %</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded">
                 <i class="fa-solid fa-droplet   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Precipitation</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg01Values->last()->rain24hours }} mm/m²</h4>
                                    <small class="me-3">Last Day Analytics - </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-gauge   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Barometric Pressure</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg02Values->last()->barometricpressure }}
                                        hPa</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-gauge   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Soil Humidity</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg02Values->last()->soilhumidity }}%</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-faucet-drip   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Soil Temperature</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg02Values->last()->soiltemperature }}
                                        °</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-temperature-three-quarters   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Sun Light UVI</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg01Values->last()->sunlightUVIndex }}
                                        UV</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-sun   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Sun Light Visible</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg01Values->last()->sunlightvisible }}
                                        %</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-regular fa-sun   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Wind Speed</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg02Values->last()->windspeed }} km/h</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-wind   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Wind Direction</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $msg02Values->last()->winddirection }}</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                 <i class="fa-solid fa-location-arrow   "></i>
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="col-md-12">
                <div id="temperature" class="card text-dark mb-3 shadow ">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header ">Temperature</h5>
                        <div class="dropdown my-auto me-3">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Today
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart1" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card text-dark mb-3 shadow">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header ">Humidity</h5>
                        <div class="dropdown my-auto me-3">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Today
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <canvas id="myChart2" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card text-dark mb-3 shadow">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header ">Precipitation</h5>
                        <div class="dropdown my-auto me-3">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                Today
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                                <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart3" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">WindSpeed</h5>
                    <div class="dropdown my-auto me-3">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Today
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                            <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart4" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">WindSpeed</h5>
                    <div class="dropdown my-auto me-3">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Today
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                            <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart4" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('scripts')

    <script>


        const data = {
            labels: @json($labelsTemperature) ,
            datasets: [{
                label: '',
                data: @json($dataTemperature) ,
                backgroundColor: [
                    'rgb(255,83,31)',
                ],
                borderColor: [
                    'rgb(255,83,31)',

                ],
                borderWidth: 3
            }]


        };

        //config
        const config = {
            type: 'line',
            data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: '°C'
                        }
                    }
                }
            }
        }
        //render init
        const myChart1 = new Chart(
            document.getElementById('myChart1'),
            config
        );

        const data2 = {
            labels: @json($labelsHumidity),
            datasets: [{
                label: 'Average Humidity',
                data: @json($dataHumidity),
                backgroundColor: [
                    'rgb(123,223,238)',
                ],
                borderColor: [
                    'rgb(123,223,238)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config2 = {
            type: 'line',
            data: data2,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: '%'
                        }
                    }
                }
            }
        }
        //render init
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );


        const data3 = {
            labels: @json($labelsPrecipitation),
            datasets: [{
                label: 'Average Precipitation',
                data: @json($dataPrecipitation),
                backgroundColor: [
                    'rgb(165,234,58)',
                ],
                borderColor: [
                    'rgb(165,234,58)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config3 = {
            type: 'line',
            data: data3,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'mm/m²'
                        }
                    }
                }
            }
        }
        //render init
        const myChart3 = new Chart(
            document.getElementById('myChart3'),
            config3
        );

        const data4 = {
            labels: @json($labelsWindSpeed),
            datasets: [{
                label: 'Average WindSpeed',
                data: @json($dataWindSpeed),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(199,230,239)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config4 = {
            type: 'line',
            data: data4,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'km/h'
                        }
                    }
                }
            }
        }
        //render init
        const myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );
    </script>
@endpush
