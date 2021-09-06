<?php

namespace App\Repository\Customer;

use App\Customer;
use App\Repository\Customer\Contracts\ManagesCustomer;
use App\User;


class CustomerManager implements ManagesCustomer
{
    public function createCustomer(string $name, string $email, string $house_identifier, string $postcode, User $creator): Customer
    {
        return Customer::create([
            'name' => $name,
            'email' => $email,
            'house_identifier' => $house_identifier,
            'postcode' => $postcode,
            'created_by' => $creator->id
        ]);
    }
}
