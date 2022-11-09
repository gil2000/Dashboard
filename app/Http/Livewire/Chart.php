<?php

namespace App\Http\Livewire;

use App\Models\ViewCurrentValueMSG1;
use Livewire\Component;

class Chart extends Component
{
    public array $data = [];
    public array $labels = [];


    public function render()
    {

        $msg01Values = ViewCurrentValueMSG1::latest()->take(10)->where('idEstacao', 1)->get()->reverse();
        $labelsTemperature = $msg01Values->pluck('created_at');
        $labelsTemperature = $labelsTemperature->map(function ($order) {
            return substr($order, 11, 5);
        });
        $dataTemperature = $msg01Values->pluck('outdoortemperature');

        return view('livewire.chart')->with(
            [
                'labelsTemperature' => $labelsTemperature,
                'dataTemperature' => $dataTemperature
            ]
        );
    }
}
