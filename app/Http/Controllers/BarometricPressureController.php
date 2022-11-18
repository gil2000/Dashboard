<?php

namespace App\Http\Controllers;


use App\Models\BarometricPressure;
use App\Models\Station;
use Carbon\Carbon;


class BarometricPressureController extends Controller
{
    public function index(){

        $stations = Station::all();

        foreach ($stations as $station) {
            $var = [];
            ${'values'.$station->id} = BarometricPressure::all()
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

//        $values01 = OutdoorTemperature::all()
//            ->where('idEstacao', '=', 1)
//            ->groupBy(function ($date) {
//                return Carbon::parse($date->created_at)->format('d/M/Y');
//            });
//
//        foreach ($values01 as $value01 => $infos01) {
//            $labels01[] = $value01.' 00:00:00';
//            $temp01 = $infos01->pluck('valor')->avg();
//            $data01[] = round($temp01, 2);
//        }
//        $values02 = OutdoorTemperature::all()
//            ->where('idEstacao', '=', 2)
//            ->groupBy(function ($date) {
//                return Carbon::parse($date->created_at)->format('d/M/Y');
//            });
//
//        foreach ($values02 as $value02 => $infos02) {
//            $labels02[] = $value02.' 00:00:00';
//            $temp02 = $infos02->pluck('valor')->avg();
//            $data02[] = round($temp02, 2);
//        }


        return view('user.barometricpressure')->with([
            'all' => $all
        ]);
    }
}
