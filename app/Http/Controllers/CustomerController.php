<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Show a list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'credit_limit' => 'required|numeric',
        ]);

        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Show the form for editing the specified customer
    // public function edit(Customer $customer)
    // {
    //     return view('customers.edit', ['customer' => $customer]);
    // }
    public function edit($id)
{
    $customer = Customer::findOrFail($id);
    return view('customers.edit', compact('customer'));
}

    // Update the specified customer in the database
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id); // Find the customer by ID
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required',
            'credit_limit' => 'required|numeric',
        ]);
    
        $customer->update($validatedData);
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    

    // Remove the specified customer from the database
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
