<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_id',
        'due_date',
        'total_amount',
        'firstname',
        'lastname',
        'address',
        'postal_code',
        'city',
        'country'
    ];
}
