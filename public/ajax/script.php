<?php

use EasyPDO\EasyPDO;

require "EasyPDO.php";

$bd = new EasyPDO();
$resultados = $bd->select("SELECT * FROM (SELECT * FROM dht22_temperature_data ORDER BY Date_n_Time DESC LIMIT 10) a ORDER BY Date_n_Time");
$dados = [];

if($bd->affectedRows < 10){

    // criar um array com um número de dados para completar 10
    $dados = array_fill(0,10 - $bd->affectedRows,0);
}

foreach ($resultados as $resultado) {
    $dados = floatval($resultado->Temperature);
}
echo json_encode($dados);



