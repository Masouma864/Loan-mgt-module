<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Borrower;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        {
            $borrowerId = $request->query('borrower_id');
        
            // Check if a specific borrower ID is provided
            if ($borrowerId) {
                $loans = Loan::where('borrower_id', $borrowerId)->get();
            } else {
                // Retrieve all loans if no specific borrower ID is provided
                $loans = Loan::all();
            }
        
            return view('loans.index', ['loans' => $loans]);
        }
    }

    public function create()
    {
        // Fetch all borrowers to populate the dropdown list
        $borrowers = Borrower::all();
        
        // Pass the $borrowers variable to the view
        return view('loans.create', compact('borrowers'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'amount' => 'required|numeric',
            'borrower_id' => 'required|exists:borrowers,id',
            'date' => 'required|date',
        ]);

        // Create a new loan instance
        $loan = new Loan();
        $loan->amount = $request->amount;
        $loan->borrower_id = $request->borrower_id;
        $loan->date = $request->date;
        
        // Save the loan to the database
        $loan->save();

        // Redirect to a relevant page (e.g., show the newly created loan)
        return redirect()->route('loans.show', $loan->id)->with('success', 'Loan created successfully!');
    }
    public function show($id)
{
    // Find the loan by its ID
    $loan = Loan::findOrFail($id);

    // Return the view to display the loan details
    return view('loans.show', compact('loan'));
}
public function edit($id)
{
    // Retrieve the loan record from the database
    $loan = Loan::findOrFail($id);
    
    // Retrieve all borrowers from the database
    $borrowers = Borrower::all();
    
    // Pass the loan and borrowers data to the edit view
    return view('loans.edit', compact('loan', 'borrowers'));
}
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'amount' => 'required|numeric',
        // Add validation rules for other fields as needed
    ]);
    
    // Find the loan record by its ID
    $loan = Loan::findOrFail($id);
    
    // Update the loan record with the validated data
    $loan->update($validatedData);
    
    // Redirect the user to the loans index page with a success message
    return redirect()->route('loans.index')->with('success', 'Loan updated successfully');
}
public function destroy($id)
{
    $loan = Loan::findOrFail($id);
    $loan->delete();
    return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
}
}
