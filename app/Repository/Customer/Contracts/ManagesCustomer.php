<?php

namespace App\Repository\Customer\Contracts;

use App\Customer;
use App\User;

/**
 * Interface Manages Customer
 * @package App\Repository\Customer\Contracts
 */
interface ManagesCustomer
{
    /**
     * @param string      $name
     * @param string      $email
     * @param string      $house_identifier
     * @param string      $postcode
     * @param User        $ceator
     *
     * @return Customer
     */
    public function createCustomer(string $name, string $email, string $house_identifier, string $postcode, User $creator): Customer;

}
