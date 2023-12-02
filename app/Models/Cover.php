<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model { 
    use HasFactory; 
    public $timestamps = false, $incrementing = false; 

    public function material()
    {
        return $this->belongsTo(Material::class, 'serialNum');
    }
}
