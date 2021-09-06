<?php

namespace App\Repository\Orders\Contracts;

use App\BroadbandSpeeds;
use App\ContractLength;
use App\Customer;
use App\CustomerOrders;
use App\User;

/**
 * Interface Manages Orders
 * @package App\Repository\Customer\Contracts
 */
interface ManagesOrders
{
    /**
     * @param Customer          $customer
     * @param ContractLength    $contractLength
     * @param BroadbandSpeeds   $broadbandSpeeds
     * @param User              $ceator
     *
     * @return CustomerOrders
     */
    public function createOrder(Customer $custom, ContractLength $contractLength, BroadbandSpeeds $broadbandSpeeds, User $creator): CustomerOrders;

}
