<?php

namespace App\Http\Controllers;
use App\Models\Station;
use App\Models\ViewCurrentValueMSG1;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{


    public function index($id)
    {

        if (Station::checkIfExists($id)) {
            return redirect()
                ->route('dashboard', 1);
        }

        if (Cache::has('msg01Values') && Cache::get('msg01Values')->last()) {

            $msg01Values = Cache::get('msg01Values')
                ->where('idEstacao', $id);


        } else {

            $msg01Values = DB::table('msgid1')
                ->whereDate('created_at', Carbon::today())
                ->where('idEstacao', $id)
                ->orderBy('created_at')
                ->get()
                ->reverse();

            Cache::put('msg01Values', $msg01Values, 120);

        }

        if (Cache::has('msg02Values') && Cache::get('msg02Values')) {

            $msg02Values = Cache::get('msg02Values')
                ->where('idEstacao', $id);

        } else {

            $msg02Values = DB::table('msgid2')
                ->whereDate('created_at', Carbon::today())
                ->where('idEstacao', $id)
                ->orderBy('created_at')
                ->get()
                ->reverse();

            Cache::put('msg02Values', $msg02Values, 120);

        }


        $lat = DB::table('estacao')
            ->where('id', $id)
            ->value('lat');

        $lon = DB::table('estacao')
            ->where('id', '=', $id)
            ->value('lon');


        $location = [
            $lat, $lon
        ];



        $dataTemperature = $msg01Values->pluck('outdoortemperature');
        $dataHumidity = $msg01Values->pluck('outdoorhumidity');
        $dataPrecipitation = $msg01Values->pluck('rain60minutes');
        $dataWindSpeed = $msg02Values->pluck('windspeed');
        $dataWindDirection = $msg02Values->pluck('winddirection');
        $dataBarometricPressure = $msg02Values->pluck('barometricpressure');
        $dataSoilHumidity = $msg02Values->pluck('soilhumidity');
        $dataSoilTemperature = $msg02Values->pluck('soiltemperature');
        $dataSunLightUVI = $msg01Values->pluck('sunlightuvindex');
        $dataSunLightVisible = $msg01Values->pluck('sunlightvisible');


        $labels01 = $msg01Values->pluck('created_at');
        $labels02 = $msg02Values->pluck('created_at');

        $stations = Station::all();

        $first = $dataTemperature->first();
        $last = $dataTemperature->last();
        $tendencyTemperature = ViewCurrentValueMSG1::calc($first, $last);


        $first = $dataHumidity->first();
        $last = $dataHumidity->last();
        $tendencyHumidity = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataPrecipitation->first();
        $last = $dataPrecipitation->last();
        $tendencyPrecipitation = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataWindSpeed->first();
        $last = $dataWindSpeed->last();
        $tendencyWindSpeed = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataBarometricPressure->first();
        $last = $dataBarometricPressure->last();
        $tendencyBarometricPressure = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataSoilTemperature->first();
        $last = $dataSoilTemperature->last();
        $tendencySoilTemperature = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataSoilHumidity->first();
        $last = $dataSoilHumidity->last();
        $tendencySoilHumidity = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataSunLightUVI->first();
        $last = $dataSunLightUVI->last();
        $tendencySunLightUVI = ViewCurrentValueMSG1::calc($first, $last);

        $first = $dataSunLightVisible->first();
        $last = $dataSunLightVisible->last();
        $tendencySunLightVisible = ViewCurrentValueMSG1::calc($first, $last);


        return view('user.dashboard')
            ->with([
                'labels01' => $labels01,
                'labels02' => $labels02,
                'dataTemperature' => $dataTemperature,
                'dataHumidity' => $dataHumidity,
                'dataPrecipitation' => $dataPrecipitation,
                'dataWindSpeed' => $dataWindSpeed,
                'dataWindDirection' => $dataWindDirection,
                'dataBarometricPressure' => $dataBarometricPressure,
                'dataSoilHumidity' => $dataSoilHumidity,
                'dataSoilTemperature' => $dataSoilTemperature,
                'dataSunLightUVI' => $dataSunLightUVI,
                'dataSunLightVisible' => $dataSunLightVisible,
                'stations' => $stations,
                'tendencyHumidity'=> $tendencyHumidity,
                'tendencyTemperature'=> $tendencyTemperature,
                'tendencyPrecipitation'=> $tendencyPrecipitation,
                'tendencyWindSpeed'=> $tendencyWindSpeed,
                'tendencyBarometricPressure' => $tendencyBarometricPressure,
                'tendencySoilTemperature' => $tendencySoilTemperature,
                'tendencySoilHumidity' => $tendencySoilHumidity,
                'tendencySunLightUVI' => $tendencySunLightUVI,
                'tendencySunLightVisible' => $tendencySunLightVisible,
                'location' => $location,
                'id' => $id
            ]);
    }


}
