<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    public $timestamps = false, $incrementing = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id');
    }
}
