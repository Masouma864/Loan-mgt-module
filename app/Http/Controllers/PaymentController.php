<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Loan;

class PaymentController extends Controller
{
    
    public function index($customer_id)
{
    
    $customerPaymentsForLoan = Payment::where('customer_id', $customer_id)
        ->get();
        
         $payments = Payment::where('customer_id', $customer_id)->get();

 
    return view('payments.index', compact('customerPaymentsForLoan','payments', 'customer_id'));
}

    public function create($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $loans = Loan::where('customer_id', $customer_id)->get();

        return view('payments.create', compact('customer', 'loans', 'customer_id'));
    }

 
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        // Retrieve the customer ID from the request
        $customerId = $request->input('customer_id');

        $payment = new Payment();
        $payment->fill($validatedData);
        $payment->customer_id = $customerId;

        $payment->save();

        return redirect()->route('payments.index', ['customer_id' => $customerId])
            ->with('success', 'Payment created successfully.');
    }

    
}
