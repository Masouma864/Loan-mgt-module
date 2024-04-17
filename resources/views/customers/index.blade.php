
@extends('layouts.app')

@section('content')

<div class="mt-4">
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Create Customer</a>
</div>

<h2 class="mt-4">All Customers</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">View</a>
                   
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                   
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                    </form>
                   
                    <a href="{{ route('loans.create', ['customer_id' => $customer->id]) }}" class="btn btn-success btn-sm">Add Loan</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection  
