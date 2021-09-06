<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Resources\Prices;
use App\LnkSpeedToContract;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index(int $contractLength,int $broadbandSpeeds): Prices
    {
        return new Prices(LnkSpeedToContract::query()
            ->where('contact_length_id', '=', $contractLength)
            ->where('broadband_speed_id', '=', $broadbandSpeeds)
            ->first());
    }
}
