<?php

namespace App\Repository\Orders;

use App\BroadbandSpeeds;
use App\ContractLength;
use App\Customer;
use App\CustomerOrders;
use App\LnkSpeedToContract;
use App\Repository\Orders\Contracts\ManagesOrders;
use App\User;
use Carbon\Carbon;


class OrderManager implements ManagesOrders
{

    public function createOrder(Customer $custom, ContractLength $contractLength, BroadbandSpeeds $broadbandSpeeds, User $creator): CustomerOrders
    {
        $lnk =LnkSpeedToContract::query()
        ->where('contact_length_id', '=', $contractLength->id)
        ->where('broadband_speed_id', '=', $broadbandSpeeds->id)
        ->first();

        return CustomerOrders::create([
            'customer_id'=> $custom->id,
            'user_id'=> $creator->id,
            'broadband_speed_id' => $broadbandSpeeds->id,
            'contract_length_id' => $contractLength->id,
            'contact_start_date' => Carbon::now(),
            'contact_end_date' => Carbon::now()->addMonth($contractLength->months),
            'monthly_cost' => $lnk->monthly_cost,
            'installation_cost' => $lnk->installation_cost,
        ]);
    }
}
