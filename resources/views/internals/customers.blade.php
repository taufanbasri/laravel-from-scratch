@extends('layout')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12"><h1>Customers List</h1></div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST">
                @csrf
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}" id="name">
                    <div>{{ $errors->first('name') }}</div>
                </div>
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" id="email">
                    <div>{{ $errors->first('email') }}</div>
                </div>

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="">Select customer status</option>
                        <option value="1" {{ old('active') === 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('active') === 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <div>{{ $errors->first('active') }}</div>
                </div>
                
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                @foreach ($activeCustomers as $customer)
                    <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                @foreach ($inactiveCustomers as $customer)
                    <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection