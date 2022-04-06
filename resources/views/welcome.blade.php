@extends('templates.main')

@section('content')
        <div class="container-fluid text-center">
            <div class="row my-5">
                <h3> Grafico Temperatura em tempo real</h3>
                <div class="col-8 mx-auto">
                    <div id="grafico"></div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" onclick="iniciar()">Start</button>
                    <button class="btn btn-primary" onclick="parar()">Stop</button>
                </div>
            </div>
        </div>




    <script>
        let dados = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        let meuIntervalo = null;
        let el = document.querySelector("#grafico");
        var options = {
            series: [{
                name: "Dados",
                data: dados
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Product Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            },
            yaxis: {
                min: 0,
                max: 100
            }
        };

        let chart = new ApexCharts(el, options);
        chart.render();

        // ------------------------------------
        function iniciar(){
            meuIntervalo = setInterval(minhaFuncao, 1000);
        }

        // ------------------------------------
        function parar(){
            clearInterval(meuIntervalo);
        }

        // ------------------------------------
        function minhaFuncao(){
            axios.get('{{asset('ajax/script.php')}}')
                .then(function(response){
                    dados = response.data;
                    chart.updateSeries(
                        [
                            {
                                data: response.data,
                            }
                        ]
                    );
                })
                .catch(function(error){
                    console.log(error);
                })

        }
    </script>

@endsection
