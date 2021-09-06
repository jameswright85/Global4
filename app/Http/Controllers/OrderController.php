<?php

namespace App\Http\Controllers;

use App\BroadbandSpeeds;
use App\ContractLength;
use App\Customer;
use App\CustomerOrders;
use App\Repository\Orders\Contracts\ManagesOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $orders = CustomerOrders::query()->where('user_id','=', Auth::user()->id)->orderBy('id', 'asc')->paginate(10);
        return view('order.orders', ['orders' => $orders]);
    }

    public function create(Request $request)
    {
        if($request->input('customer_id') !== null) {
            session()->put('customer_id', $request->get('customer_id'));
        }

        $data = [
          'customer' => Customer::find($request->input('customer_id')),
          'contractLengths' => ContractLength::all(),
          'broadbandSpeeds' => BroadbandSpeeds::all()
        ];

        return view('order.create', $data);
    }

    public function store(Request $request, ManagesOrders $managesOrders)
    {
        //uses dropdown boxes and no fields that can be left blank
        $managesOrders->createOrder(
            Customer::find($request->get('customer_id')),
            ContractLength::find($request->get('contractLength')),
            BroadbandSpeeds::find($request->get('broadbandSpeed')),
            Auth::user()
        );

        return redirect(route('order.index'));
    }

    public function show(CustomerOrders $order)
    {
        //not implemented
    }

    public function edit(CustomerOrders $order)
    {
        //not implemented
    }

    public function update(CustomerOrders $order)
    {
        //not implemented
    }

    public function destroy(CustomerOrders $order)
    {
        //not implemented
    }
}
