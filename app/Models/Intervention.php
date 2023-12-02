<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientNum');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'registrationNum');
    }

    public function covers()
    {
        return $this->hasMany(Cover::class, 'sheetNum');
    }
}