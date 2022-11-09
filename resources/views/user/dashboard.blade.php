@extends('layouts.main')

@section('content')
    <div class="h1 justify-content-center mb-5 border border-1 rounded-3 p-3 shadow d-flex">
        <p class="my-auto me-3">Dashboard {{ \Carbon\Carbon::now()->toDateString() }}</p>
        <div class="dropdown my-auto me-3">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Station
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                @foreach($stations as $station)

                    <a class="dropdown-item @if(Request::is('dashboard/'.$station->id) == $station->id) active @else '' @endif"
                       href="{{ route('dashboard', $station->id) }}">{{ $station->nomeEstacao }}</a>

                @endforeach
            </div>
        </div>
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
                                    <h4 class="card-title mb-2">{{ $dataTemperature->last() }}
                                        °</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small
                                        class="@if($tendencyTemperature > 0) text-success @else text-danger  @endif">@if($tendencyTemperature > 0 ) (+{{ $tendencyTemperature }}%) @else() ({{ $tendencyTemperature }}%) @endif
                                    </small>
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
                                    <h4 class="card-title mb-2">{{ $dataHumidity->last() }}
                                        %</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="@if($tendencyHumidity > 0) text-success @else text-danger  @endif">@if($tendencyHumidity > 0 ) (+{{ $tendencyHumidity }}%) @else() {{ $tendencyHumidity }}% @endif </small>
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
                                    <h4 class="card-title mb-2">{{ $dataPrecipitation->last() }} mm/m²</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="@if($tendencyPrecipitation > 0) text-success @elseif($tendencyPrecipitation == 0) text-info @else text-danger  @endif">@if($tendencyPrecipitation > 0 ) (+{{ $tendencyPrecipitation }}%) @else() ({{ $tendencyPrecipitation }}%) @endif </small>
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
                                    <h4 class="card-title mb-2">{{ $dataBarometricPressure->last() }}
                                        hPa</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencyBarometricPressure > 0)
                                            text-success
                                        @elseif($tendencyPrecipitation == 0)
                                            text-info
                                        @else t
                                            ext-danger
                                        @endif">
                                        @if($tendencyBarometricPressure > 0 )
                                            (+{{ $tendencyBarometricPressure }}%)
                                        @else()
                                            ({{ $tendencyBarometricPressure }}%)
                                        @endif
                                    </small>
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
                                    <h4 class="card-title mb-2">{{ $dataSoilHumidity->last() }}%</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencySoilHumidity > 0)
                                            text-success
                                        @elseif($tendencySoilHumidity == 0)
                                            text-info
                                        @else
                                            text-danger
                                        @endif">
                                        @if($tendencySoilHumidity > 0 )
                                            (+{{ $tendencySoilHumidity }}%)
                                        @else()
                                            ({{ $tendencySoilHumidity }}%)
                                        @endif
                                    </small>
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
                                    <h4 class="card-title mb-2">{{ $dataSoilTemperature->last() }}
                                        °</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencySoilTemperature > 0)
                                        text-success
                                        @elseif($tendencySoilTemperature == 0)
                                        text-info
                                        @else
                                        text-danger
                                        @endif">
                                        @if($tendencySoilTemperature > 0 )
                                            (+{{ $tendencySoilTemperature }}%)
                                        @else()
                                            ({{ $tendencySoilTemperature }}%)
                                        @endif
                                    </small>
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
                                    <h4 class="card-title mb-2">{{ $dataSunLightUVI->last() }}
                                        UV</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencySunLightUVI > 0)
                                        text-success
                                        @elseif($tendencySunLightUVI == 0)
                                        text-info
                                        @else
                                        text-danger
                                        @endif">
                                        @if($tendencySunLightUVI > 0 )
                                            (+{{ $tendencySunLightUVI }}%)
                                        @else()
                                            ({{ $tendencySunLightUVI }}%)
                                        @endif
                                    </small>
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
                <div class="col-md-6 mb-3">
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
                                    <h4 class="card-title mb-2">{{ $dataSunLightVisible->last() }}
                                        %</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencySunLightVisible > 0)
                                        text-success
                                        @elseif($tendencySunLightVisible == 0)
                                        text-info
                                        @else
                                        text-danger
                                        @endif">
                                        @if($tendencySunLightVisible > 0 )
                                            (+{{ $tendencySunLightVisible }}%)
                                        @else()
                                            ({{ $tendencySunLightVisible }}%)
                                        @endif
                                    </small>
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
                <div class="col-md-6 mb-3">
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
                                    <h4 class="card-title mb-2">{{ $dataWindSpeed->last() }} km/h</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="
                                        @if($tendencyWindSpeed > 0)
                                        text-success
                                        @elseif($tendencyWindSpeed == 0)
                                        text-info
                                        @else
                                        text-danger
                                        @endif">
                                        @if($tendencyWindSpeed > 0 )
                                            (+{{ $tendencyWindSpeed }}%)
                                        @else()
                                            ({{ $tendencyWindSpeed }}%)
                                        @endif
                                    </small>
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
                                    <a class="dropdown-item" href="{{ route('winddirection') }}">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Todays Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $dataWindDirection->last() }}</h4>
                                </div>
                                <small></small>
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
                                Last Values
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div  class="card-body">
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
                    <h5 class="card-header ">Barometric Pressure</h5>
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
                    <canvas id="myChart5" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">Soil Humidity</h5>
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
                    <canvas id="myChart6" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">Soil Temperature</h5>
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
                    <canvas id="myChart7" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">Sun Light UVI</h5>
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
                    <canvas id="myChart8" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark mb-3 shadow">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header ">Sun Light Visible</h5>
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
                    <canvas id="myChart9" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('scripts')

    <script>
        setInterval(function() {
            window.location.reload();
        }, 120000);

        const data = {
            labels: @json($labels01) ,
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


        var url = "http://agricity.test/api/teste/1"
        // function to update our chart
        // var getData = function() {
        //     $.getJSON(url, data).done(function(response) {
        //
        //         myChart1.data.labels = response.labelsTemperature;
        //         myChart1.data.datasets[0].data = response.dataTemperature;
        //         myChart1.update();
        //     });
        // };
        //
        // setInterval(getData, 1000 * 60 * 2);
        //

        const data2 = {
            labels: @json($labels01),
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
            labels: @json($labels01),
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
            labels: @json($labels02),
            datasets: [{
                label: 'Average WindSpeed',
                data: @json($dataWindSpeed),
                backgroundColor: [
                    'rgb(81,229,213)',
                ],
                borderColor: [
                    'rgb(81,229,213)',

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

        const data5 = {
            labels: @json($labels02),
            datasets: [{
                label: 'Average WindSpeed',
                data: @json($dataBarometricPressure),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(0,0,0)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config5 = {
            type: 'line',
            data: data5,
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
                            text: 'hPa'
                        }
                    }
                }
            }
        }
        //render init
        const myChart5 = new Chart(
            document.getElementById('myChart5'),
            config5
        );

        const data6 = {
            labels: @json($labels02),
            datasets: [{
                label: 'Average WindSpeed',
                data: @json($dataSoilHumidity),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(106,178,239)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config6 = {
            type: 'line',
            data: data6,
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
        const myChart6 = new Chart(
            document.getElementById('myChart6'),
            config6
        );

        const data7 = {
            labels: @json($labels02),
            datasets: [{
                label: 'Average Soil Temperature',
                data: @json($dataSoilTemperature),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(140,34,34)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config7 = {
            type: 'line',
            data: data7,
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
                            text: 'ºC'
                        }
                    }
                }
            }
        }
        //render init
        const myChart7 = new Chart(
            document.getElementById('myChart7'),
            config7
        );

        const data8 = {
            labels: @json($labels01),
            datasets: [{
                label: 'Average Soil Temperature',
                data: @json($dataSunLightUVI),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(227,243,113)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config8 = {
            type: 'line',
            data: data8,
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
                            text: 'UV'
                        }
                    }
                }
            }
        }
        //render init
        const myChart8 = new Chart(
            document.getElementById('myChart8'),
            config8
        );

        const data9 = {
            labels: @json($labels01),
            datasets: [{
                label: 'Average Soil Temperature',
                data: @json($dataSunLightVisible),
                backgroundColor: [
                    'rgb(199,230,239)',
                ],
                borderColor: [
                    'rgb(255,184,0)',

                ],
                borderWidth: 3
            }]
        };

        //config
        const config9 = {
            type: 'line',
            data: data9,
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
        const myChart9 = new Chart(
            document.getElementById('myChart9'),
            config9
        );


    </script>
@endpush
