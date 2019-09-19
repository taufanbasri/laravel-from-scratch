@extends('layout')

@section('title', 'Add New Customers')

@section('content')
    <form action="/contact" method="POST">
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
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control @error('email')is-invalid @enderror">{{ old('message') }}</textarea>
            <div>{{ $errors->first('message') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection