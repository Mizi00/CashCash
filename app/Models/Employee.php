<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname', 'lastname', 'mailAddress', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays
     */
    protected $hidden = ['password'];

    /**
     * Define a one-to-one relationship with the Technician model
     */
    public function technician()
    {
        return $this->hasOne(Technician::class, 'id');
    }

    /**
     * Check if the employee is a technician
     */
    public function isTechnician()
    {
        return $this->technician()->exists();
    }
}
