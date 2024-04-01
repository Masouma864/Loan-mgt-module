<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'is_in_debt',
        'debt_amount',
    ];

    protected $casts = [
        'is_in_debt' => 'boolean',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Loan::class);
    }
}
