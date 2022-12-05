<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarometricPressure;
use App\Models\OutdoorTemperature;
use App\Models\ViewCurrentValueMSG1;
use Carbon\Carbon;
use App\Models\Station;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class Api extends Controller
{

    public function getStation() {
        return DB::table('estacao')
            ->select('id', 'nomeEstacao', 'lat', 'lon', 'altitude')
            ->get();

    }

    public function getTemperature($id) {

        $temperature = DB::table('outdoortemperature')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at', 'idEstacao')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $temperature;

    }

    public function getHumidity($id) {

        $humidity = DB::table('outdoorhumidity')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at', 'idEstacao')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $humidity;

    }

    public function getBarometricPressure($id) {

        $barometricPressure = DB::table('barometricpressure')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at', 'idEstacao')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();

        return $barometricPressure;

    }

    public function androidRegister() {

    }

    public function getPrecipitation($id) {

        $precipitation = DB::table('rain24hours')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $precipitation;

    }

    public function getSoilHumidity($id) {

        $soilHumidity = DB::table('soilhumidity')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $soilHumidity;

    }

    public function getSoilTemperature($id) {

        $soilTemperature = DB::table('soiltemperature')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $soilTemperature;

    }

    public function getSunLightUVI($id) {

        $sunLightUVI = DB::table('sunlightuvindex')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $sunLightUVI;

    }

    public function getSunLightVisible($id) {

        $sunLightVisible = DB::table('sunlightvisible')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $sunLightVisible;

    }

    public function getWindDirection($id) {

        $windDirection = DB::table('winddirection')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $windDirection;

    }

    public function getWindSpeed($id) {

        $windSpeed = DB::table('windspeed')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values()
            ->toJson();


        return $windSpeed;

    }
}
