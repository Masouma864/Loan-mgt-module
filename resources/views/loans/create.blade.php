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
                                <label for="customer_id">{{ __('Customer ID') }}</label>
                                <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{ $customer->id }}">
                                <input type="text" class="form-control" value="{{ $customer->id }}" readonly>
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
                                <label for="loan_amount">{{ __('Loan Amount') }}</label>
                                <input type="number" class="form-control" id="loan_amount" name="loan_amount">
                            </div>

                            <div class="form-group">
                                <label for="loan_date">{{ __('Loan Date') }}</label>
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

        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Loan List') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Loan Amount</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Payment Terms</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $loan->customer->name }}</td>
                                        <td>{{ $loan->product->name }}</td>
                                        <td>{{ $loan->loan_amount }}</td>
                                        <td>{{ $loan->loan_date }}</td>
                                        <td>{{ $loan->payment_terms }}</td>
                                        <td>
                                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this loan?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
