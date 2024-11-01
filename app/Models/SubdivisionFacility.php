<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubdivisionFacility extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subdivision_facility';

    // Allow mass assignment for these columns
    protected $fillable = [
        'name',
        'fee',
        'available_days',
        'available_months',
        'start_time',
        'end_time',
        'hex_code',
    ];

    // Specify any casting (for JSON storage)
    protected $casts = [
        'available_days' => 'array',
        'available_months' => 'array',
    ];

    public function timeSlots()
    {
        return $this->hasMany(FacilityTimeSlot::class, 'facility_id');
    }

    // Accessor for available_days to decode JSON
    public function getAvailableDaysAttribute($value)
    {
        return json_decode($value, true);
    }

    // Accessor for available_months to decode JSON
    public function getAvailableMonthsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function availableDates()
    {
        return $this->hasMany(FacilityDate::class, 'facility_id');
    }
    
}
