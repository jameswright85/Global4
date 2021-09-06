<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Repository\Customer\Contracts\ManagesCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $customers = Customer::query()->orderBy('name', 'asc')->paginate(10);
        return view('customer.customers', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request, ManagesCustomer $managesCustomer)
    {
        $rules = [
            'email'=>'required|email:rfc,dns|unique:customers,email',
            'name' => 'required|min:2',
            'postcode' => 'required',
            'house_identifier' => 'required',
        ];

        $this->validate($request,$rules);

        $managesCustomer->createCustomer(
            $request->get('name'),
            $request->get('email'),
            $request->get('house_identifier'),
            $request->get('postcode'),
            Auth::user()
        );

        return redirect(route('customer.index'));
    }

    public function show(Customer $customer)
    {
        //not implemented
    }

    public function edit(Customer $customer)
    {
        //not implemented
    }

    public function update(Customer $customer)
    {
        //not implemented
    }

    public function destroy(Customer $customer)
    {
        //not implemented
    }
}
