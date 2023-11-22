<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    public $timestamps = false;

    protected $fillable = [
        'firstname', 'lastname', 'mailAddress', 'password'
    ];

    protected $hidden = ['password'];
}
