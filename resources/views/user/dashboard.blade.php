@extends('templates.main')

@section('content')
    <div class="row container mx-auto">
        <h1 class="text-center my-3 mb-5 border border-1 rounded-3 p-3 shadow">Main Real-Time Dashboard</h1>
        <div class="mt-5 col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-dark mb-3 shadow">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header ">Temperature</h5>
                            <div class="dropdown my-auto me-3">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hoje
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                    <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-dark mb-3 shadow">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header ">Humidity</h5>
                            <div class="dropdown my-auto me-3">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hoje
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                    <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-dark mb-3 shadow">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header ">Precipitation</h5>
                            <div class="dropdown my-auto me-3">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hoje
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="">
                                    <a class="dropdown-item" href="javascript:void(0);">Ultima Semana</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Ultimo Mês</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <canvas id="myChart3" height="50"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-4 order-2 mt-5">
            <div class="card h-100">
                <div class="card-header text-center shadow shadow-sm">
                    <h5 class="card-title m-0 me-2">Current Values</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-1">
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-temperature-three-quarters fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Outdoor Temperature</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentTemperature->valor }}</h6>
                                    <span class="text-muted"> °</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-droplet fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Outdoor Humidity</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentHumidity->valor }}</h6>
                                    <span class="text-muted"> %</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-gauge fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Barometric Pressure</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentBarometricPressure->valor }}</h6>
                                    <span class="text-muted"> bar</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-cloud-rain fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Precipitation</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentPrecipitation->valor }}</h6>
                                    <span class="text-muted"> mm/m<sup>2</sup></span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-faucet-drip fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Soil Humidity</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentSoilHumidity->valor }}</h6>
                                    <span class="text-muted"> %</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-temperature-three-quarters fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Soil Temperature</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentSoilTemperature->valor }}</h6>
                                    <span class="text-muted"> °</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-sun fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Sun Light UVI</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentSunLightUVI->valor }}</h6>
                                    <span class="text-muted"> UV</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-regular fa-sun fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Sun Light Visible</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentSunLightUVI->valor }}</h6>
                                    <span class="text-muted"> </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex my-4">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-wind fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Wind Speed</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentWindSpeed->valor }}</h6>
                                    <span class="text-muted"> Km/h</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-2">
                                <i class="fa-solid fa-location-arrow fa-2xl"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Wind Direction</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{ $currentWindDirection->valor }}</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>

        const data = {
            labels: ['10/01', '11/01', '12/01', '13/01', '14/01', '15/01'],
            datasets: [{
                label: 'Average Temperature',
                data: [27, 25, 26, 30, 31, 24],
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
                scales: {
                    y: {
                        beginAtZero: true
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
            labels: ['10/01', '11/01', '12/01', '13/01', '14/01', '15/01'],
            datasets: [{
                label: 'Average Humidity',
                data: [10, 7, 4, 0, 1, 3],
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
                scales: {
                    y: {
                        beginAtZero: true
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
            labels: ['10/01', '11/01', '12/01', '13/01', '14/01', '15/01'],
            datasets: [{
                label: 'Average Precipitation',
                data: [17, 10, 20, 15, 1, 17],
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
                scales: {
                    y: {
                        beginAtZero: true
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
            labels: ['10/01', '11/01', '12/01', '13/01', '14/01', '15/01'],
            datasets: [{
                label: 'Average WindSpeed',
                data: [2, 3, 1, 0, 5, 6],
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }
        //render init
        const myChart4 = new Chart(
            document.getElementById('myChart4'),
            config4
        );



        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8,
            mapId: 'MAP_ID'
        });


    </script>
@endsection
