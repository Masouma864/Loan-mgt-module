@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Loan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loans.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="customer_id">{{ __('Customer') }}</label>
                                <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $customer->id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="product_id">{{ __('Product') }}</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="loan_amount">{{ __('Loan_Amount') }}</label>
                                <input type="number" class="form-control" id="loan_amount" name="loan_amount">
                            </div>

                            <div class="form-group">
                                <label for="loan_date">{{ __('Loan_Date') }}</label>
                                <input type="date" class="form-control" id="loan_date" name="loan_date">
                            </div>

                            <div class="form-group">
                                <label for="payment_terms">{{ __('Payment Terms') }}</label>
                                <input type="text" class="form-control" id="payment_terms" name="payment_terms">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
