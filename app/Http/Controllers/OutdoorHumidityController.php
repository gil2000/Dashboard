<?php

namespace App\Http\Controllers;

use App\Models\OutdoorHumidity;
use App\Models\Station;
use Carbon\Carbon;


class OutdoorHumidityController extends Controller
{
    public function index() {

        $stations = Station::all();

        foreach ($stations as $station) {
            $var = [];
            ${'values'.$station->id} = OutdoorHumidity::all()
                ->where('idEstacao', '=', $station->id)
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                });

            foreach (${'values'.$station->id} as ${'value'.$station->id} => ${'infos'.$station->id}) {
                ${'labels'.$station->id} = ${'value'.$station->id};
                ${'temp'.$station->id} = ${'infos'.$station->id}->pluck('valor')->avg();
                ${'data'.$station->id} = round(${'temp'.$station->id}, 2);

                $var[] = [${'labels'.$station->id}, ${'data'.$station->id}];
            }
            $id = $station->id;

            $all[] = [
                'id' => $id,
                'var' => $var,
            ];
        }

//      foreach ($values as $value => $infos) {
//          $labels = $value;
//          $temp = $infos->pluck('valor')->avg();
//          $data = round($temp, 2);
//
//          $var[] =  [$labels, $data];
//        }

        return view('user.outdoorhumidity')->with([
            'all' => $all,
            'stations' => $stations
        ]);
    }
}
