<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WindDirection extends Model
{
    protected $table = 'winddirection';

    public static function search($from,$to, $station)
    {

        $winddirections = WindDirection::query();
        $id = Station::all();

        if ($station != null) {
            foreach ($station as $id) {
                if ($id == '1') {
                    $winddirections = $winddirections->where('idEstacao', '=', 1);
                }
                if ($id == '2') {
                    $winddirections = $winddirections->where('idEstacao', '=', 2);
                }

            }
        }



        if (!empty($from) && !empty($to)) {
            $winddirections = $winddirections->whereBetween('created_at', [$from.' 00:00:00', $to.' 23:59:59']);
        }

        elseif (!empty($from)) {
            $winddirections = $winddirections->where('created_at', '>=', $from);
        }

        elseif (!empty($to)) {
            $winddirections = $winddirections->where('created_at', '>=', $to);
        }


        return $winddirections;
    }
}
