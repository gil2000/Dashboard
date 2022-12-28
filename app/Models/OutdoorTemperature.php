<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorTemperature extends Model
{
    protected $table = 'outdoortemperature';

    public function station(){

        return $this->belongsTo(Station::class, 'idEstacao');
    }

    public function getIdAttribute() {
        return $this->station()->pluck('id');
    }
}


