<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OutdoorTemperature;
use App\Models\ViewCurrentValueMSG1;
use Carbon\Carbon;


class Api extends Controller
{
    public function temperature($id) {

        $label = [];
        $data = [];


        $dias = OutdoorTemperature::whereBetween('created_at', [now()->subDays(7), now()] )
            ->orderBy('created_at')
            ->get()
            ->where('idEstacao', '=', $id)
            ->groupBy(function ($date) {
               return Carbon::parse($date->created_at)->format('d');
            });




        foreach ($dias as $dia => $infos) {
            $label[] = $dia;
            $data[] = $infos->pluck('valor')->avg();
        }


        return response()->json([
            'labels' => $label,
            'data' => $data
        ]);

    }
}
