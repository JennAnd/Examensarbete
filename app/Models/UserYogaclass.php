<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserYogaclass extends Model
{
    use HasFactory;

    protected $table = 'user_yogaclass';

    protected $fillable = [
        'user_id',
        'yogaclass_id',
    ];
}
