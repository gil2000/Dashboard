<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ViewCurrentValueMSG1 extends Model
{
    protected $table = 'msgid1';

    static function calc($first, $last)
    {
        $tendency = $first == 0 ? 0 : round(((($last - $first) / $first) * 100), 1);
        return $tendency;
    }


}
