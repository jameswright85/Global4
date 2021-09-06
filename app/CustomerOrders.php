<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrders extends Model
{
    protected $fillable = ['customer_id','user_id','broadband_speed_id','contract_length_id','contact_start_date','contact_end_date','monthly_cost','installation_cost'];

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function broadbandSpeed(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BroadbandSpeeds::class);
    }

    public function contractLength(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ContractLength::class);
    }
}
