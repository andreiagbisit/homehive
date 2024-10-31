<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityTimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['facility_id', 'start_time', 'end_time'];

    // Define inverse relationship to the facility
    public function facility()
    {
        return $this->belongsTo(SubdivisionFacility::class, 'facility_id');
    }
}
