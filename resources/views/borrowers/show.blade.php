@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3 mb-4">Borrower Details</h2>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Name:</strong> {{ $borrower->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $borrower->email }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('borrowers.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
            <a href="{{ route('loans.index', ['borrower_id' => $borrower->id]) }}" class="btn btn-primary">View Loans</a>
        </div>
    </div>
@endsection
