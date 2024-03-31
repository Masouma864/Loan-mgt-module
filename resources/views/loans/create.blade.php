@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Loan') }}</div>

                    <div class="card-body">
                        <form action="{{ route('loans.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="amount">{{ __('Amount:') }}</label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                            <div class="form-group">
                                <label for="borrower_id">{{ __('Borrower:') }}</label>
                                <select class="form-control" id="borrower_id" name="borrower_id">
                                    @foreach($borrowers as $borrower)
                                        <option value="{{ $borrower->id }}">{{ $borrower->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">{{ __('Date:') }}</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('loans.index') }}" class="btn btn-secondary">{{ __('Back to List') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
