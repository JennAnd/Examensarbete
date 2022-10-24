<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yogaclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class-name',
        'teacher',
        'date',
        'time',
        'length',
        'available',
        'reserved',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
