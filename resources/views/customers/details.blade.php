@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>

        <h2>Loans</h2>
        @if ($loans->count() > 0)
            <ul>
                @foreach ($loans as $loan)
                    <li>{{ $loan->loan_amount }}</li>
                @endforeach
            </ul>
        @else
            <p>No loans found for this customer.</p>
        @endif

        <h2>Payments</h2>
        @if ($payments->count() > 0)
            <ul>
                @foreach ($payments as $payment)
                    <li>{{ $payment->amount }}</li>
                @endforeach
            </ul>
        @else
            <p>No payments found for this customer.</p>
        @endif
    </div>
@endsection
