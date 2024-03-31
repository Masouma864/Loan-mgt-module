@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Loans List</h2>
        <a href="{{ route('loans.create') }}" class="btn btn-primary mb-3">Add New Loan</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Borrower</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->id }}</td>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->borrower->name }}</td>
                        <td>{{ $loan->date }}</td>
                        <td>
                            <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('borrowers.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
