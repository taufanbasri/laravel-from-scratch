@extends('layout')

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12"><h1>Customers List</h1></div>
        <p><a href="customers/create">Add New Customer</a></p>
    </div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">{{ $customer->id }}</div>
            <div class="col-4">{{ $customer->name }}</div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach
@endsection