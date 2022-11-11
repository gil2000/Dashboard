<?php

namespace App\Http\Controllers;

use App\Models\OutdoorTemperature;
use Carbon\Carbon;


class OutdoorTemperatureController extends Controller
{
    public function index(){

        $dias = OutdoorTemperature::whereBetween('created_at', [now()->subDays(7), now()] )
            ->orderBy('created_at')
            ->get()
            ->where('idEstacao', '=', 1)
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d');
            });


        foreach ($dias as $dia => $infos) {
            $label[] = $dia;
            $data[] = $infos->pluck('valor')->avg();
        }

        return view('user.outdoortemperature')->with([
            'labels' => $label,
            'data' => $data
        ]);
    }
}
