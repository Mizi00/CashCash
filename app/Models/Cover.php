<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model { 
    use HasFactory; 

    /**
     * Indicates if the model should be timestamped and incrementing
     */
    public $timestamps = false, $incrementing = false; 

    /**
     *  Define a many-to-one relationship with the Material model using the 'serialNum' as the foreign key.
     */
    public function material()
    {
        return $this->belongsTo(Material::class, 'serialNum');
    }
}
