<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BorrowerController;

Route::get('/', [BorrowerController::class,'index'])->name('borrowers.index');
Route::get('/borrowers/create', [BorrowerController::class,'create'])->name('borrowers.create');
Route::post('/borrowers', [BorrowerController::class,'store'])->name('borrowers.store');
Route::get('/borrowers/{id}', [BorrowerController::class,'show'])->name('borrowers.show');
Route::get('/borrowers/{id}/edit', [BorrowerController::class,'edit'])->name('borrowers.edit');
Route::put('/borrowers/{id}', [BorrowerController::class,'update'])->name('borrowers.update');
Route::delete('/borrowers/{id}', [BorrowerController::class,'destroy'])->name('borrowers.destroy');

// Loan routes
Route::get('/loans', [LoanController::class , 'index'])->name('loans.index');
Route::get('/loans/create', [LoanController::class ,'create'])->name('loans.create');
Route::post('/loans', [LoanController::class ,'store'])->name('loans.store');
Route::get('/loans/{id}', [LoanController::class ,'show'])->name('loans.show');
Route::get('/loans/{id}/edit', [LoanController::class ,'edit'])->name('loans.edit');
Route::put('/loans/{id}', [LoanController::class ,'update'])->name('loans.update');
Route::delete('/loans/{id}', [LoanController::class ,'destroy'])->name('loans.destroy');
