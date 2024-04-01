@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Loan Details') }}</div>

                    <div class="card-body">
                        <p><strong>Customer:</strong> {{ $loan->customer->name }}</p>
                        <p><strong>Amount:</strong> {{ $loan->loan_amount }}</p>
                        <p><strong>Date:</strong> {{ $loan->loan_date }}</p>
                        <p><strong>Status:</strong> {{ $loan->status }}</p>
                        <p><strong>Remaining Amount:</strong> {{ $loan->remaining_amount }}</p>
                    </div>

                    <div class="card-footer">
    <a href="{{ route('loans.index') }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
    <a href="{{ route('loans.payments', $loan->id) }}" class="btn btn-primary">{{ __('View Payments') }}</a>
</div>
                </div>
            </div>
        </div>
    </div>
@endsection
