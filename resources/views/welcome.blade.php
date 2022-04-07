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
        let el = document.querySelector('#grafico');
        let options = {
            chart: {
                type: 'area',
                height: '400px',
                animations: {
                    enabled: false
                }
            },
            series: [{
                name: 'Dados',
                data: dados
            }],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['1','2','3','4','5','6','7','8','9','10']
            },
            yaxis: {
                min: 0,
                max: 100
            }
        };
        let chart = new ApexCharts(el, options);
        chart.render();


        // ------------------------------------
        function minhaFuncao(){

            axios.get({{ route('api.chart') }})
                .then(function(response){
                    dados = response.data;

                    chart.updateSeries(
                        [
                            {
                                data: response.data
                            }
                        ]
                    );
                })
                .catch(function(error){
                    console.log(error);
                })

            setInterval(minhaFuncao, 1000)
        }

        minhaFuncao();
        setInterval(() => {
            updateChart();
        }, 1000);

    </script>

@endsection
