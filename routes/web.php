<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('landing');
})->name('home');
Route::get('/borrowers', [BorrowerController::class,'index'])->name('borrowers.index');
Route::get('/borrowers/create', [BorrowerController::class,'create'])->name('borrowers.create');
Route::post('/borrowers', [BorrowerController::class,'store'])->name('borrowers.store');
Route::get('/borrowers/{id}', [BorrowerController::class,'show'])->name('borrowers.show');
Route::get('/borrowers/{id}/edit', [BorrowerController::class,'edit'])->name('borrowers.edit');
Route::put('/borrowers/{borrower}', [BorrowerController::class,'update'])->name('borrowers.update');
Route::delete('/borrowers/{id}', [BorrowerController::class,'destroy'])->name('borrowers.destroy');

// Loan routes
Route::get('/loans', [LoanController::class , 'index'])->name('loans.index');
Route::get('/customers/{customer_id}/loans/create', [LoanController::class, 'create'])->name('loans.create');

Route::post('/loans', [LoanController::class ,'store'])->name('loans.store');
Route::get('/loans/{id}', [LoanController::class ,'show'])->name('loans.show');
Route::get('/loans/{loan_id}/edit', [LoanController::class, 'edit'])->name('loans.edit');

Route::put('/loans/{id}', [LoanController::class ,'update'])->name('loans.update');
Route::delete('/loans/{id}', [LoanController::class ,'destroy'])->name('loans.destroy');
Route::get('loans/{loan}/payments', [LoanController::class,'showPayments'])->name('loans.payments');

 //customers
Route::get('/customers', [CustomerController::class ,'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class ,'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class ,'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [CustomerController::class ,'edit'])->name('customers.edit');
Route::delete('/customers/{id}', [CustomerController::class ,'destroy'])->name('customers.destroy');
Route::get('/customers/{id}', [CustomerController::class ,'customerDetails'])->name('customers.show');

Route::put('/customers/{id}', [CustomerController::class ,'update'])->name('customers.update');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::resource('payments', PaymentController::class);
Route::get('/payments/create/{customer_id}', [PaymentController::class, 'create'])->name('payment.create');

// Define routes for payment form
Route::get('/customers/{customer_id}/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::get('/customers/{customer_id}/payments', [PaymentController::class ,'index'])->name('payments.index');

Route::post('/customers/{customer_id}/payments', [PaymentController::class, 'store'])->name('payments.store');


Route::get('/reports', [ReportController::class, 'allReports'])->name('all.reports');
// Customer Report Route
Route::get('/customer-report', [ReportController::class, 'customerReport'])->name('customer.report');

// Loan Report Route
Route::get('/loan-report', [ReportController::class, 'loanReport'])->name('loan.report');

// Payment Report Route
Route::get('/payment-report', [ReportController::class, 'paymentReport'])->name('payment.report');