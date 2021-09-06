@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">New Customer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{ route('customer.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="house_identifier">House Name/Number</label>
                                    <input type="text" class="form-control" id="house_identifier" name="house_identifier" placeholder="Enter House Name or Number" value="{{ old('house_identifier') }}">
                                    @error('email')
                                    <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('house_identifier') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="postcode">House Postcode</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter House Postcode" value="{{ old('postcode') }}">
                                    @error('postcode')
                                    <div class="bg-danger text-white p-2 rounded mt-1">{{ $errors->first('postcode') }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Create Customer</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
