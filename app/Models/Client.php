<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = false;
    protected $fillable = ['socialReason', 'sirenNum', 'apeCode', 'address', 'phoneNumber', 'faxNum', 'mailAddress'];

    /**
     * Get the associated agency for this client.
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agencyNum');
    }
}
