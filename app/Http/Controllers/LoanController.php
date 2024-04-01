<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Product;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $borrowerId = $request->query('borrower_id');
            
            if ($borrowerId) {
                $loans = Loan::where('borrower_id', $borrowerId)->get();
            } else {
               
                $loans = Loan::all();
            }
            
            return view('loans.index', ['loans' => $loans]);
        } catch (\Exception $e) {
           
            return back()->withError('Failed to fetch loans.');
        }
    }

    public function create($customer_id)
    {
        // Fetch list of customers to populate dropdown
    
        $customer = Customer::findOrFail($customer_id);
        $products = Product::all(); 
        $loans = Loan::all();
        return view('loans.create', compact('customer', 'loans','products'));

    }
    public function show($id)
    {
        // Find the loan
        $loan = Loan::findOrFail($id);

        return view('loans.show', compact('loan'));
    }
    public function showPayments(Loan $loan)
    {
        $payments = $loan->payments;
        
        return view('loans.payments', compact('loan', 'payments'));
    }
    public function edit($id)
    {
       
        $loan = Loan::findOrFail($id);
        $customers = Customer::all(); 
   
       $products = Product::all();
       
        return view('loans.edit', compact('loan', 'customers','products'));
    }
 

public function store(Request $request)
{
    
    $validatedData = $request->validate([
    'customer_id' => 'required|exists:customers,id', // Assuming you have a customer_id field in your loans table
    'product_id' => 'required|exists:products,id',
    'loan_amount' => 'required|numeric',

    'loan_date' => 'required|date',
    'payment_terms' => 'required|string',
]);

$loan = new Loan();

// Assign the customer ID
$loan->customer_id = $validatedData['customer_id'];
$loan->product_id = $validatedData['product_id'];
$loan->loan_amount = $validatedData['loan_amount'];
$loan->loan_date = $validatedData['loan_date'];
$loan->payment_terms = $validatedData['payment_terms'];
$loan->save();

    return redirect()->route('loans.index')->with('success', 'Loan registered successfully.');
    
}

public function update(Request $request, $id)
{
    // Retrieve the loan by ID
    $loan = Loan::findOrFail($id);
    
    // Validate the incoming request data
    $validatedData = $request->validate([
        'customer_id' => 'required|exists:customers,id', // Assuming you have a customer_id field in your loans table
        'product_id' => 'required|exists:products,id',
        'loan_amount' => 'required|numeric',
        'loan_date' => 'required|date',
        'payment_terms' => 'required|string',
    ]);

    $loan->update($validatedData);

    return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
}

public function destroy($id)
{
    $loan = Loan::findOrFail($id);
    $loan->delete();
    return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
}
}
