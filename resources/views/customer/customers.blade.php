@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Customers</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" href="{{ route('customer.create') }}" role="button">Add New Customer</a>
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email Address</td>
                                <td>House Identifier</td>
                                <td>Postcode</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->house_identifier }}</td>
                                    <td>{{ $customer->postcode }}</td>
                                    <td><a href="{{ route('order.create', ['customer_id' => $customer->id]) }}"><i class="fas fa-shopping-cart"></i> Create Order</a> </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Customers found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                        {!! $customers->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
