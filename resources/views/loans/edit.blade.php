@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Loan</h2>
        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ $loan->amount }}">
            </div>
            <div class="form-group">
                <label for="borrower_id">Borrower:</label>
                <select class="form-control" id="borrower_id" name="borrower_id">
                    @foreach($borrowers as $borrower)
                        <option value="{{ $borrower->id }}" @if($loan->borrower_id == $borrower->id) selected @endif>{{ $borrower->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $loan->date }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
