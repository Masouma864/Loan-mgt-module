<!-- resources/views/payments/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Payments</h1>
        <div class="mb-3">
    <a href="{{ route('payments.create', ['customer_id' => $customer_id]) }}" class="btn btn-primary">Add New Payment</a>
</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                   
                </tr>
            </thead>
            <tbody>
            @foreach ($customerPaymentsForLoan as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
