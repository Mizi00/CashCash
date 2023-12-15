<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * Define a many-to-one relationship with the MaterialType model using the 'internalRef' as the foreign key.
     */
    public function materialtype() 
    {
        return $this->belongsTo(MaterialType::class, 'internalRef', 'internalRef');
    }
}