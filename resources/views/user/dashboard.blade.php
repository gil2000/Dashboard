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
        <div class="col-md-12 py-5">
            <div id="map" style="height: 180px; border-radius: 10px">

            </div>
        </div>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                        class="@if($tendencyTemperature > 0) text-success @elseif($tendencyTemperature == 0) text-info @else text-danger  @endif">@if($tendencyTemperature > 0 ) (+{{ $tendencyTemperature }}%) @else() ({{ $tendencyTemperature }}%) @endif
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <h4 class="card-title mb-2">{{ $dataHumidity->last() }}
                                        %</h4>
                                    <small class="me-3">Last Day Analytics- </small>
                                    <small class="@if($tendencyHumidity > 0) text-success @elseif($tendencyHumidity == 0) text-info  @else text-danger  @endif">@if($tendencyHumidity > 0 ) (+{{ $tendencyHumidity }}%) @else() {{ $tendencyHumidity }}% @endif </small>
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
                                    <a class="dropdown-item" href="javascript:void(0);">Today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                                    <a class="dropdown-item" href="javascript:void(0);">today Graphic</a>
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
                    <div id="myChart1"  class="card-body">

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
                                Last Values
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                            </div>
                        </div>
                    </div>

                    <div id="myChart2" class="card-body">
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
                                Last Values
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div id="myChart3" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart4" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart5" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart6" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart7" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart8" class="card-body">
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
                            Last Values
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                            <a class="dropdown-item" href="javascript:void(0);">More Details</a>
                        </div>
                    </div>
                </div>
                <div id="myChart9" class="card-body">
                </div>
            </div>
        </div>

    </div>



@endsection

@push('scripts')

    <script>


        var map = L.map('map').setView(@json($location), 14);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker(@json($location)).addTo(map)
            .bindPopup();

         setInterval(function() {
             window.location.reload();
         }, 120000);

        const options = {
            series: [{
                name: "Temperature",
                data: @json($dataTemperature)
            }],
            chart: {
                height: 200,
                type: 'area',
            },
            toolbar: {
                autoSelected: 'zoom'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#ea2e0d']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#ffffff'],
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels01),
            },
            yaxis: {
                title: {
                    text: 'ºC',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options2 = {
            series: [{
                name: "Humidity",
                data: @json($dataHumidity)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#53e1d7']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels01),
            },
            yaxis: {
                title: {
                    text: '%',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options3 = {
            series: [{
                name: "Precipitation",
                data: @json($dataPrecipitation)
            }],
            chart: {
                height: 200,
                type: 'line',

            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#399de5']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels01),
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options4 = {
            series: [{
                name: "Wind Speed",
                data: @json($dataWindSpeed)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#86a7af']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels02),
            },
            yaxis: {
                title: {
                    text: 'Km/h',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options5 = {
            series: [{
                name: "Barometric Pressure",
                data: @json($dataBarometricPressure)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#000000']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels02),
            },
            yaxis: {
                title: {
                    text: 'hPa',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options6 = {
            series: [{
                name: "Soil Humidity",
                data: @json($dataSoilHumidity)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#5a44ee']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels02),
            },
            yaxis: {
                title: {
                    text: '%',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options7 = {
            series: [{
                name: "Soil Temperature",
                data: @json($dataSoilTemperature)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#fc4e4e']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels02),
            },
            yaxis: {
                title: {
                    text: 'ºC',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options8 = {
            series: [{
                name: "Sun Light UVI",
                data: @json($dataSunLightUVI)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#ffb800']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels01),
            },
            yaxis: {
                title: {
                    text: 'UV',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const options9 = {
            series: [{
                name: "Sun Light Visible",
                data: @json($dataSunLightVisible)
            }],
            chart: {
                height: 200,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                colors: ['#e0894c']
            },
            markers: {
                hover: {
                    sizeOffset: 4
                }
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                type: 'datetime',
                categories: @json($labels01),
            },
            yaxis: {
                title: {
                    text: '%',
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                }
            }
        };

        const myChart1 = new ApexCharts(document.getElementById('myChart1'), options);
        myChart1.render();

        const myChart2 = new ApexCharts(document.getElementById('myChart2'), options2);
        myChart2.render();

        const myChart3 = new ApexCharts(document.getElementById('myChart3'), options3);
        myChart3.render();

        const myChart4 = new ApexCharts(document.getElementById('myChart4'), options4);
        myChart4.render();

        const myChart5 = new ApexCharts(document.getElementById('myChart5'), options5);
        myChart5.render();

        const myChart6 = new ApexCharts(document.getElementById('myChart6'), options6);
        myChart6.render();

        const myChart7 = new ApexCharts(document.getElementById('myChart7'), options7);
        myChart7.render();

        const myChart8 = new ApexCharts(document.getElementById('myChart8'), options8);
        myChart8.render();

        const myChart9 = new ApexCharts(document.getElementById('myChart9'), options9);
        myChart9.render();

        {{--const data = {--}}
        {{--    labels: @json($labels01) ,--}}
        {{--    datasets: [{--}}
        {{--        label: '',--}}
        {{--        data: @json($dataTemperature) ,--}}
        {{--        backgroundColor: [--}}
        {{--            'rgb(255,83,31)',--}}
        {{--        ],--}}
        {{--        borderColor: [--}}
        {{--            'rgb(255,83,31)',--}}

        {{--        ],--}}
        {{--        borderWidth: 3--}}
        {{--    }]--}}


        {{--};--}}

        {{--//config--}}
        {{--const config = {--}}
        {{--    type: 'line',--}}
        {{--    data,--}}
        {{--    options: {--}}
        {{--        plugins: {--}}
        {{--            legend: {--}}
        {{--                display: false--}}
        {{--            }--}}
        {{--        },--}}
        {{--        scales: {--}}
        {{--            x: {--}}
        {{--                title: {--}}
        {{--                    display: true,--}}
        {{--                    text: 'Time'--}}
        {{--                }--}}
        {{--            },--}}
        {{--            y: {--}}
        {{--                title: {--}}
        {{--                    display: true,--}}
        {{--                    text: '°C'--}}
        {{--                }--}}
        {{--            }--}}
        {{--        }--}}
        {{--    }--}}
        {{--}--}}
        {{--//render init--}}
        {{--const myChart1 = new Chart(--}}
        {{--    document.getElementById('myChart1'),--}}
        {{--    config--}}
        {{--);--}}

        {{--var url = "http://agricity.test/api/teste/1"--}}
        {{--// function to update our chart--}}
        {{--// var getData = function() {--}}
        {{--//     $.getJSON(url, data).done(function(response) {--}}
        {{--//--}}
        {{--//         myChart1.data.labels = response.labelsTemperature;--}}
        {{--//         myChart1.data.datasets[0].data = response.dataTemperature;--}}
        {{--//         myChart1.update();--}}
        {{--//     });--}}
        {{--// };--}}
        {{--//--}}
        {{--// setInterval(getData, 1000 * 60 * 2);--}}
        {{--//--}}


    </script>
@endpush
