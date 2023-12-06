<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'dateTimeVisit',
        'registrationNum'
    ];

    /**
     * Define a many-to-one relationship with the Client model using the 'clientNum' as the foreign key
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientNum');
    }

    /**
     * Define a many-to-one relationship with the Technician model using the 'registrationNum' as the foreign key
     */
    public function technician()
    {
        return $this->belongsTo(Technician::class, 'registrationNum');
    }

    /**
     * Define a many-to-many relationship with the Material model using the 'covers' pivot table
     */
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'covers', 'sheetNum', 'serialNum')
            ->withPivot('commentWorks', 'passingTime');
    }
  
    /**
     * Get the number of materials associated with the intervention
     */
    public function getNumberOfMaterialsAttribute()
    {
        return $this->materials->count();
    }

    /**
     * Check if all materials associated with the intervention are completed
     */
    public function isCompleted()
    {
        foreach ($this->materials as $material) {
            if (is_null($material->pivot->commentWorks) || is_null($material->pivot->passingTime)) {
                return false;
            }
        }
        return true;
    }
}