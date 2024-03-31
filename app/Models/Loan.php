<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'date',
        
    ];
    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
