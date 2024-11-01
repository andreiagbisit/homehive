<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleStickerApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_sticker_application';

    protected $casts = [
        'date_of_payment' => 'date',
        'appt_date' => 'date', // Add other date fields as necessary
    ];
    
    protected $fillable = [
        'user_id',
        'registered_owner',
        'make',
        'series',
        'color',
        'plate_no',
        'fee',
        'payment_mode_id',
        'payment_collector_id',
        'appt_date',
        'appt_time',
        'date_of_payment',
        'receipt_img'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collector()
    {
        return $this->belongsTo(PaymentCollector::class, 'payment_collector_id');
    }
}
