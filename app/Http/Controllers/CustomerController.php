<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::all();
 
        return view('customers.index', compact('customers'));
    }
    
    public function create()
    {

        return view('customers.create');

    }
    public function customerDetails($customer_id)
{
    $customer = Customer::findOrFail($customer_id);

    $loans = Loan::where('customer_id', $customer_id)->get();
    $payments = Payment::whereIn('loan_id', $loans->pluck('id'))->get();

    return view('customers.details', compact('customer', 'loans', 'payments'));
}

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            
        ]);

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->phone = $validatedData['phone'];
        $customer->address = $validatedData['address'] ?? null;
      
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }


    public function edit($id)
{
    $customer = Customer::findOrFail($id);
    return view('customers.edit', compact('customer'));
}

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id); 
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        $customer->update($validatedData);
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
    public function updateCustomerDebtStatus($customerId, $amount)
{
 
    $customer = Customer::findOrFail($customerId);

   
    $customer->is_in_debt = true; 
    $customer->debt_amount += $amount; 
    $customer->save();

}
}