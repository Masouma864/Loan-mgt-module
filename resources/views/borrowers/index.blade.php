@extends('layouts.app')

@section('content')
    <div class="container">
    <h2 class="mt-4">Borrowers List</h2>
        <a href="{{ route('borrowers.create') }}" class="btn btn-primary mt-4">Add New Borrower</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowers as $borrower)
                    <tr>
                        <td>{{ $borrower->id }}</td>
                        <td>{{ $borrower->name }}</td>
                        <td>{{ $borrower->email }}</td>
                        <td>
                            <a href="{{ route('borrowers.show', $borrower->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" style="display: inline-block;">
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
@endsection
