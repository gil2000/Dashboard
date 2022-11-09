<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ViewCurrentValueMSG1;


class Api extends Controller
{
    public function temperature($id) {

        $msg01Values = ViewCurrentValueMSG1::latest()->take(10)->where('idEstacao', $id)->get()->reverse();

        $labelsTemperature = $msg01Values->pluck('created_at');
        $labelsTemperature = $labelsTemperature->map(function ($order) {
            return substr($order, 11, 5);
        });
        $dataTemperature = $msg01Values->pluck('outdoortemperature');


        return response()->json([
            'labelsTemperature' => $labelsTemperature,
            'dataTemperature' => $dataTemperature
        ]);

    }
}
