<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LnkSpeedToContract extends Model
{
    protected $table = 'lnk_speed_to_contract';
    protected $primaryKey = ['contact_length_id', 'broadband_speed_id'];
    public $incrementing = false;

    protected $fillable = ['contact_length_id', 'broadband_speed_id','monthly_cost','installation_cost'];
}
