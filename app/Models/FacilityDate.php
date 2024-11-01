<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityDate extends Model
{
    use HasFactory;
    protected $fillable = ['facility_id', 'date'];

    // Define inverse relationship back to the facility
    public function facility()
    {
        return $this->belongsTo(SubdivisionFacility::class, 'facility_id');
    }
}
