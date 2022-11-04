<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutdoorTemperature extends Controller
{
    public function index(){
        return view('user.outdoortemperature');
    }
}
