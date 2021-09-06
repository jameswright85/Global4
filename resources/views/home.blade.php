@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Current Weekly Quota - {{ $startOfWeek }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col {{ ($currentValue < $value ? 'bg-danger text-white' : 'bg-success') }} m-3 text-center rounded py-2">
                            Weekly Sales Quota Value<br>
                            {{ $currentValue }} of {{ $value }}
                        </div>
                        <div class="col">

                        </div>
                        <div class="col {{ ($currentQty < $qty ? 'bg-danger text-white' : 'bg-success') }} m-3 text-center rounded py-2">
                            Weekly Sales Quota Qty<br>
                            {{ $currentQty }} of {{ $qty }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-3 text-center rounded py-2 bg-secondary">
                            <a href="{{ route('customer.index') }}" class="text-white">
                                <i class="fas fa-users fa-3x"></i><br>
                                <span>Customers</span>
                            </a>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col m-3 text-center rounded py-2 bg-secondary">
                            <a href="{{ route('order.index') }}" class="text-white">
                                <i class="fas fa-shopping-cart fa-3x"></i><br>
                                <span>Orders</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
