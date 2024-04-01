<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'description', 'customer_id',
        
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
