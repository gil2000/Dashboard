<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

$resultados = DB::select("SELECT * FROM (SELECT * FROM dht22_temperature_data ORDER BY Date_n_Time DESC LIMIT 10) a ORDER BY Date_n_Time");
$dados = [];
foreach ($resultados as $resultado) {
    $dados[] = floatval($resultado->Temperature);
}
echo json_encode($dados);


