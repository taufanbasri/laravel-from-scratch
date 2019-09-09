@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customers" method="POST" class="pb-5">
        @csrf

        <div class="input-group">
            <input type="text" name="name" class="@error('name')is-invalid @enderror">
        </div>
        <div>{{ $errors->first('name') }}</div>
        <button type="submit">Add Customer</button>
    </form>

    <ul>
        @foreach ($customers as $customer)
            <li>{{ $customer->name }}</li>
        @endforeach
    </ul>
@endsection