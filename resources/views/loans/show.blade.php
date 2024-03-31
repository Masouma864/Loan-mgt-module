@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3 mb-4">Loan Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Loan ID: {{ $loan->id }}</h5>
                <p class="card-text"><strong>Amount:</strong> {{ $loan->amount }}</p>
                <p class="card-text"><strong>Borrower:</strong> {{ $loan->borrower->name }}</p>
                <p class="card-text"><strong>Date:</strong> {{ $loan->date }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
