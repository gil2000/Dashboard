<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index()
    {
        $currentTemperature = DB::table('outdoortemperature')->latest()->first();
        $currentHumidity = DB::table('outdoorhumidity')->latest()->first();
        $currentPrecipitation = DB::table('rain60minutes')->latest()->first();
        $currentWindSpeed = DB::table('windspeed')->latest()->first();
        $currentSoilTemperature = DB::table('soiltemperature')->latest()->first();
        $currentBarometricPressure = DB::table('barometricpressure')->latest()->first();
        $currentSoilHumidity = DB::table('soilhumidity')->latest()->first();
        $currentSunLightUVI = DB::table('sunlightuvindex')->latest()->first();
        $currentBSunLightVisible = DB::table('sunlightvisible')->latest()->first();
        $currentWindDirection = DB::table('winddirection')->latest()->first();

        return view('user.dashboard')
            ->with([
                'currentTemperature' => $currentTemperature,
                'currentHumidity' => $currentHumidity,
                'currentPrecipitation' => $currentPrecipitation,
                'currentWindSpeed' => $currentWindSpeed,
                'currentBarometricPressure' => $currentBarometricPressure,
                'currentSoilTemperature' => $currentSoilTemperature,
                'currentWindDirection' => $currentWindDirection,
                'currentSoilHumidity' => $currentSoilHumidity,
                'currentSunLightUVI' => $currentSunLightUVI,
                'currentSunLightVisible' => $currentBSunLightVisible
            ]);
    }
}
