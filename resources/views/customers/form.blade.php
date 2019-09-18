<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') ?? $customer->name }}" id="name">
    <div>{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') ?? $customer->email }}" id="email">
    <div>{{ $errors->first('email') }}</div>
</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control @error('active')is-invalid @enderror">
        @if (Route::is('customers.create'))
            <option value="">Select customer status</option>
            @foreach ($customer->activeOptions() as $key => $option)
                <option value="{{ $key }}" {{ old('active') == $key ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        @else
            @foreach ($customer->activeOptions() as $key => $option)
                <option value="{{ $key }}" {{ $customer->active == $option ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        @endif
    </select>
    <div>{{ $errors->first('active') }}</div>
</div>

<div class="form-group">
    <label for="company">Status</label>
    <select name="company_id" id="company_id" class="form-control @error('company_id')is-invalid @enderror">
        @if (Route::is('customers.create'))
            <option value="">Select company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        @else
            <option value="">Select company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ $customer->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        @endif
    </select>
    <div>{{ $errors->first('company_id') }}</div>
</div>