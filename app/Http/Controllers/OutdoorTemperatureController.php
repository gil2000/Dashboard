<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OutdoorTemperatureController extends Controller
{
    public function index(){

        $stations = Station::all();

        foreach ($stations as $station) {
            $var = [];
            $range = [];
            $day = [];
            ${'values' . $station->id} = DB::table('outdoortemperature')
                ->where('idEstacao', '=', $station->id)
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                });


            foreach (${'values' . $station->id} as ${'value' . $station->id} => ${'infos' . $station->id}) {

                ${'labels' . $station->id} = ${'value' . $station->id};
                ${'temp' . $station->id} = ${'infos' . $station->id}->pluck('valor')->avg();
                ${'data' . $station->id} = round(${'temp' . $station->id}, 2);
                ${'max' . $station->id} = ${'infos' . $station->id}->pluck('valor')->max();
                ${'min' . $station->id} = ${'infos' . $station->id}->pluck('valor')->min();


                $var[] = [
                    ${'labels' . $station->id},
                    ${'data' . $station->id}
                ];

                $range[] = [
                    [${'min' . $station->id}, ${'max' . $station->id}],
                    'day' => ${'value' . $station->id}
                ];

            }

            $id = $station->id;
            $all[] = [
                'id' => $id,
                'var' => $var,
            ];
            $temprange[] = [
                'id' => $id,
                'range' => $range,
                'day' => $day,
            ];
        }

        return view('user.outdoortemperature')->with([
            'all' => $all,
            'temprange' => $temprange,
            ]);
    }
}
