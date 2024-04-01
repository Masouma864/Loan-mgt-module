<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
         'customer_id',
        'loan_amount',
        'product_id',
        'loan_date',
        'payment_terms',
    ];
    

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
  
}
