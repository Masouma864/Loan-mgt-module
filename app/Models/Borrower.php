<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','phone', 'loan_history'];
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
