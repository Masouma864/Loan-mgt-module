<!-- resources/views/loans/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Loan') }}</div>

                    <div class="card-body">
                        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="customer_id">{{ __('Customer:') }}</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $customer->id == $loan->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_id">{{ __('Product:') }}</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $product->id == $loan->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="loan_amount">{{ __('Loan Amount:') }}</label>
                                <input type="text" class="form-control" id="loan_amount" name="loan_amount" value="{{ $loan->loan_amount }}">
                            </div>
                            <div class="form-group">
                                <label for="loan_date">{{ __('Loan Date:') }}</label>
                                <input type="date" class="form-control" id="loan_date" name="loan_date" value="{{ $loan->loan_date }}">
                            </div>
                            <div class="form-group">
                                <label for="payment_terms">{{ __('Payment Terms:') }}</label>
                                <input type="text" class="form-control" id="payment_terms" name="payment_terms" value="{{ $loan->payment_terms }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('loans.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
