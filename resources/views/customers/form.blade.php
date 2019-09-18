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
            <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Inactive</option>
        @else
            <option value="">Select customer status</option>
            <option value="1" {{ $customer->active == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $customer->active == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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