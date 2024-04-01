<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Payment;

class ReportController extends Controller
{
    public function allReports()
{
  
    $customers = Customer::all();
    $loans = Loan::all();
    $payments = Payment::all();

    return view('reports.all', [
        'customers' => $customers,
        'loans' => $loans,
        'payments' => $payments,
    ]);
}
    public function customerReport()
    {
    
        $customers = Customer::all();

        // Pass the data to the view
        return view('reports.customer', ['customers' => $customers]);
    }

    public function loanReport()
    {
      
        $loans = Loan::all();

        return view('reports.loan', ['loans' => $loans]);
    }

    public function paymentReport()
    {

        $payments = Payment::all();

        return view('reports.payment', ['payments' => $payments]);
    }
    public function generateReports()
{

    $debtorsCount = Customer::where('is_in_debt', true)->count();

    $totalDebts = Customer::where('is_in_debt', true)->sum('debt_amount');

    $averagePayment = Payment::average('amount_paid');

    return view('reports.index', compact('debtorsCount', 'totalDebts', 'averagePayment'));
}
public function showDebtReport()
{

    $debtors = Customer::where('is_in_debt', true)->get();

    return view('debt_report', compact('debtors'));
}
}
