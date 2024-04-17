<?php

namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Borrower;

use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function findDebtorsForProduct($productId)
    {
        // اجرای پرسمان برای یافتن مشتریان بدهکار برای محصول موردنظر
        $borrowers = Customer::whereHas('orders', function ($query) use ($productId) {
            $query->where('product_id', $productId)
                  ->whereColumn('total_amount', '>', 'amount_paid');
        })->get();

        // مشتریان بدهکار را برگردانید
        return view('borrowers.index', compact('borrowers'));
    }
    public function index()
    {
        $borrowers = Borrower::all();
        return view('borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(Request $request)
    {
        Borrower::create($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower created successfully.');
    }

    public function show($id)
    {
        $borrower = Borrower::findOrFail($id);
        return view('borrowers.show', compact('borrower'));
    }

    public function edit($id)
    {
        // Fetch the borrower data
        $borrower = Borrower::findOrFail($id);
        
        // Pass the borrower data to the view
        return view('loans.edit', ['borrower' => $borrower]);
    }

    public function update(Request $request, Borrower $borrower)
    {
        $borrower->update($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully.');
    }

    public function destroy($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->delete();
        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully.');
    }
}

