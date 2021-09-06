@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All My Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Broadband Speed</td>
                                <td>Contract Length</td>
                                <td>Contract Start Date</td>
                                <td>Contract End Date</td>
                                <td>Monthly Cost</td>
                                <td>Installation Cost</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->broadbandSpeed->name }}</td>
                                    <td>{{ $order->contractLength->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($order->contact_start_date)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($order->contact_end_date)) }}</td>
                                    <td>£{{ $order->monthly_cost }}</td>
                                    <td>£{{ $order->installation_cost }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Orders found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                        {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
