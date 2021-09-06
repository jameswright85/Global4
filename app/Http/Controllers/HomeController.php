<?php

namespace App\Http\Controllers;

use App\CustomerOrders;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salesQty = CustomerOrders::query()
                ->where('user_id','=', Auth::user()->id)
                ->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);

        $data = [
            'value' => config('targets.value'),
            'qty' => config('targets.qty'),
            'currentQty' => $salesQty->count(),
            'currentValue' => ($salesQty->sum('installation_cost') + $salesQty->sum('monthly_cost')),
            'startOfWeek' => Carbon::now()->startOfWeek()->format('d/m/Y'),
        ];

        return view('home', $data);
    }
}
