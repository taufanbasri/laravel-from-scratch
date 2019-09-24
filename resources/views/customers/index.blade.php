@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12"><h1>Customers List</h1></div>
        <p><a href="customers/create">Add New Customer</a></p>
    </div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">{{ $customer->id }}</div>
            <div class="col-4">
                <a href="customers/{{ $customer->id }}">{{ $customer->name }}</a>
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach

    <div class="row pt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ $customers->links() }}
        </div>
    </div>
@endsection