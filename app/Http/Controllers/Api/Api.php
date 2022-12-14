<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Password;

class Api extends Controller
{

    public function register(Request $request) {
        /*$fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);


        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);*/

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

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
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();
        return $temperature;

    }

    public function getHumidity($id) {

        $humidity = DB::table('outdoorhumidity')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $humidity;

    }

    public function getBarometricPressure($id) {

        $barometricPressure = DB::table('barometricpressure')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
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
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $precipitation;

    }

    public function getSoilHumidity($id) {

        $soilHumidity = DB::table('soilhumidity')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $soilHumidity;

    }

    public function getSoilTemperature($id) {

        $soilTemperature = DB::table('soiltemperature')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $soilTemperature;

    }

    public function getSunLightUVI($id) {

        $sunLightUVI = DB::table('sunlightuvindex')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $sunLightUVI;

    }

    public function getSunLightVisible($id) {

        $sunLightVisible = DB::table('sunlightvisible')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();

        return $sunLightVisible;

    }

    public function getWindDirection($id) {

        $windDirection = DB::table('winddirection')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $windDirection;

    }

    public function getWindSpeed($id) {

        $windSpeed = DB::table('windspeed')
            ->latest()
            ->take(10)
            //->whereDate('created_at', Carbon::today())
            ->where('idEstacao', $id)
            ->select('valor', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->reverse()
            ->values();


        return $windSpeed;

    }


}
