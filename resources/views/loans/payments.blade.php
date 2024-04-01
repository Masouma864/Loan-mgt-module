
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Payments for Loan') }}</div>

                    <div class="card-body">
                        <p><strong>Loan:</strong> {{ $loan->id }}</p>
                        <p><strong>Customer:</strong> {{ $loan->customer->name }}</p>
                        <p><strong>Amount:</strong> {{ $loan->loan_amount }}</p>
                       
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Payments</h5>
                        <ul class="list-group">
                            @foreach($payments as $payment)
                                <li class="list-group-item">
                                    Payment Amount: {{ $payment->amount }} | Payment Date: {{ $payment->payment_date }}
                                  
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('loans.index') }}" class="btn btn-secondary">{{ __('Back to Loan List') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
