<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    /**
     * Indicates if the model should be timestamped and incrementing
     */
    public $timestamps = false, $incrementing = false;

    /**
     * Define a many-to-one relationship with the Employee model using the 'id' as the foreign key
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    /**
     * Define a one-to-many relationship with the Intervention model
     */
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'registrationNum');
    }
}