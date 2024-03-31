<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'credit_limit'];

    // Define a one-to-many relationship with the Loan model
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
