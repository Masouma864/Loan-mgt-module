@extends('layouts.app')

@section('content') 
    <div class="container">
        <h1>All Reports</h1>

        <section>
            <h2>Reports</h2>
            <ul>
                <li><a href="{{ route('customer.report') }}">Customer Report</a></li>
                <li><a href="{{ route('loan.report') }}">Loan Report</a></li>
                <li><a href="{{ route('payment.report') }}">Payment Report</a></li>
            </ul>
        </section>

        <a href="{{ route('home') }}" class="btn">Back to Home</a>
    </div>
    @endsection
