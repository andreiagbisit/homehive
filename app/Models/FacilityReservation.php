<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityReservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'facility_reservation';

    // In FacilityReservation.php model

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'appt_date' => 'datetime', // Add other date fields as needed
        'payment_date' => 'date',
    ];


    protected $fillable = [

        'user_id', 
        'facility_id', 
        'start_date', 
        'end_date', 
        'appt_start_time', 
        'appt_end_time', 
        'appt_date', 
        'fee', 
        'payment_mode_id', 
        'payment_collector_id', 
        'reference_no', 
        'receipt_path',
        'payment_date'
        
        ];

    // Relationships
    public function facility()
    {
        return $this->belongsTo(SubdivisionFacility::class, 'facility_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function collector()
    {
        return $this->belongsTo(PaymentCollector::class, 'payment_collector_id');
    }

        // In FacilityReservation.php model
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

}

