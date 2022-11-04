<?php

namespace App\Http\Controllers;
use App\Models\Station;
use App\Models\ViewCurrentValueMSG1;
use App\Models\ViewCurrentValueMSG2;

use Illuminate\Support\Facades\Cache;



class Dashboard extends Controller
{
    public function index($id)
    {

        if (Cache::has('msg01Values') && Cache::get('msg01Values')->last()->idEstacao == $id) {

            $msg01Values = Cache::get('msg01Values')->where('idEstacao', $id);


        } else {

            $msg01Values = ViewCurrentValueMSG1::latest()->take(10)->where('idEstacao', $id)->get()->reverse();
            Cache::put('msg01Values', $msg01Values, 120);

        }

        if (Cache::has('msg02Values') && Cache::get('msg02Values')->last()->idEstacao == $id) {

            $msg02Values = Cache::get('msg02Values')->where('idEstacao', $id);

        } else {

            $msg02Values = ViewCurrentValueMSG2::latest()->take(10)->where('idEstacao', $id)->get()->reverse();
            Cache::put('msg02Values', $msg02Values, 120);

        }


        $labelsTemperature = $msg01Values->pluck('created_at');

        $labelsTemperature = $labelsTemperature->map(function ($order) {
            return substr($order, 11, 5);
        });

        $dataTemperature = $msg01Values->pluck('outdoortemperature');
        $first = $dataTemperature->first();
        $last = $dataTemperature->last();
        $tendency =round(( (($last - $first)/$first) * 100) , 1 )  ;

        $labelsHumidity = $msg01Values->pluck('created_at');
        $labelsHumidity = $labelsHumidity->map(function ($order) {
            return substr($order, 11, 5); // Return only the first ten characters.
        });

        $dataHumidity = $msg01Values->pluck('outdoorhumidity');

        $labelsPrecipitation = $msg01Values->pluck('created_at');
        $labelsPrecipitation = $labelsPrecipitation->map(function ($order) {
            return substr($order, 11, 5); // Return only the first ten characters.
        });

        $dataPrecipitation = $msg01Values->pluck('rain60minutes');

        $labelsWindSpeed = $msg02Values->pluck('created_at');
        $labelsWindSpeed = $labelsWindSpeed->map(function ($order) {
            return substr($order, 11, 5); // Return only the first ten characters.
        });

        $dataWindSpeed = $msg02Values->pluck('windspeed');


        $stations = Station::all();

        return view('user.dashboard')
            ->with([
                'msg01Values' => $msg01Values,
                'msg02Values' => $msg02Values,
                'labelsTemperature' => $labelsTemperature,
                'dataTemperature' => $dataTemperature,
                'labelsHumidity' => $labelsHumidity,
                'dataHumidity' => $dataHumidity,
                'labelsPrecipitation' => $labelsPrecipitation,
                'dataPrecipitation' => $dataPrecipitation,
                'labelsWindSpeed' => $labelsWindSpeed,
                'dataWindSpeed' => $dataWindSpeed,
                'stations' => $stations,
                'tendency'=> $tendency
            ]);
    }


}
