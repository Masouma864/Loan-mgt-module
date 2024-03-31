@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4">Edit Borrower</h2>
        <form action="{{ route('borrowers.update', ['id' => $borrower->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $borrower->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $borrower->email }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('borrowers.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection