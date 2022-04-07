<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Temperatura extends Model
{
    use HasFactory;
    protected $table = "dht22_temperature_data";
    protected $primaryKey = "id";

    protected $fillable = [
        'SensorID',
        'created_at',
        'Temperature',
    ];




}
