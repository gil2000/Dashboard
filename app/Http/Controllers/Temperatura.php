<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Temperatura extends Controller
{
    public function index(){
        return view('welcome');
    }

    public static function script() {

    }
}
