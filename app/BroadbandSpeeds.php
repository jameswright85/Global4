<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadbandSpeeds extends Model
{
    protected $fillable = ['name','speed_up', 'speed_down'];
}
