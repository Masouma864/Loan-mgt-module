@extends('layouts.app')

@section('content')
<form action="{{ route('customers.update', ['id' => $customer->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
    </div>

    <div class="form-group">
        <label for="credit_limit">Credit Limit:</label>
        <input type="number" class="form-control" id="credit_limit" name="credit_limit" value="{{ $customer->credit_limit }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Customer</button>
</form>
@endsection