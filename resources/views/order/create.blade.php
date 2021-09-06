@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Order</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{ route('order.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="customer_id" value="{{ Session::get('customer_id') }}">
                                <div class="form-group">
                                    <label for="name">Customer Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="broadbandSpeed">Broadband Speed</label>
                                    <select name="broadbandSpeed" id="broadbandSpeed" class="form-control">
                                        @foreach($broadbandSpeeds as $speed)
                                            <option value="{{ $speed->id }}">{{ $speed->name }} (Download: {{ $speed->speed_down }}mbps / Upload {{ $speed->speed_up }}mbps)</option>
                                        @endforeach
                                    </select>
                                    @error('broadbandSpeed')
                                    <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('broadbandSpeed') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contractLength">Contract Length</label>
                                    <select name="contractLength" id="contractLength" class="form-control">
                                        @foreach($contractLengths as $length)
                                            <option value="{{ $length->id }}">{{ $length->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('contractLength')
                                    <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('contractLength') }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create Order</button>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Order Details</div>

                    <div class="card-body">
                        <span>Installation Price: £</span><span id="installationPrice" class="font-weight-bold"></span><br>
                        <span>Monthly Price: £</span><span id="monthlyPrice" class="font-weight-bold"></span><br>
                        <hr>
                        <span>Pay Today: £</span><span id="totalPrice" class="font-weight-bold"></span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        function calculatePrices()
        {
            $.ajax({
                type: 'GET',
                url: '{{ \Illuminate\Support\Facades\URL::to('/') }}/api/packageprice/' + $('#contractLength option:selected').val() + '/' + $('#broadbandSpeed option:selected').val(),
                success: function (data) {
                   $('#installationPrice').html(data.data.installation_cost);
                   $('#monthlyPrice').html(data.data.monthly_cost);
                   $('#totalPrice').html(data.data.installation_cost);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $(document).ready(function(){
            calculatePrices();

            $('body').on('change',"#broadbandSpeed" , function(e) {
                e.preventDefault();
                calculatePrices();
            });

            $('body').on('change',"#contractLength" , function(e) {
                e.preventDefault();
                calculatePrices();
            });
        });
    </script>
@endsection
