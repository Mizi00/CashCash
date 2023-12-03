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

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'covers', 'sheetNum', 'serialNum')
            ->withPivot('commentWorks', 'passingTime');
    }
  
    public function getNumberOfMaterialsAttribute()
    {
        return $this->materials->count();
    }
}