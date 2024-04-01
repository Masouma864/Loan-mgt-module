@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Make Payment</h1>
        <form action="{{ route('payments.store', ['customer_id' => $customer_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <div class="form-group">
                <label for="loan_id">Select Loan:</label>
                <select class="form-control" id="loan_id" name="loan_id">
                    @foreach ($loans as $loan)
                        <option value="{{ $loan->id }}">{{ $loan->loan_amount }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
