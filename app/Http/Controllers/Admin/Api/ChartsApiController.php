<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temperatura;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;
use Illuminate\Database\Query\Builder;

class ChartsApiController extends Controller
{
    public static function index(){

        //$valor = Temperatura::latest()->take(10)->get()->sortBy('id');

        // $valor = DB::select("SELECT * FROM (SELECT * FROM dht22_temperature_data ORDER BY Date_n_Time DESC LIMIT 10) a ORDER BY Date_n_Time");

        $valor = DB::table('dht22_temperature_data')
                    ->latest()
                    ->limit(10)
                    ->get();

        //$temperatura = $valor->pluck('Temperature');

        $id = $valor->pluck('id');
        $temp = $valor->pluck('Temperature');


        return response()->json(compact('id', 'temp'));



    }
}
