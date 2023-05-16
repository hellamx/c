<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'login',
        'username',
        'password',
        'phone',
        'email',
        'role'
    ];

    use HasFactory;
}
