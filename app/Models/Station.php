<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'estacao';



    public static function checkIfExists($id) {

        if (!Station::where('id', $id)->exists()) {
            return true;
        }
        return false;
    }
}
