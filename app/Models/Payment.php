<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentCategory;
use App\Models\PaymentCollector;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payment';

    protected $casts = [
        'pay_date' => 'date',
    ];
    
     // Define fillable fields to allow mass assignment
     protected $fillable = [
        'title',        // Subject
        'user_id',      // Representative
        'category_id',  // Category
        'fee',          // Amount
        'status_id',    // Status (Paid, Pending)
        'pay_date',     // Date of payment
        'mode_id',      // Mode of payment (Gcash, On-site)
        'collector_id', // Collector
        'month',        // Month intended for the payment
        'year',         // Year intended for the payment
    ];

    // Define any necessary relationships (assuming relationships exist)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(PaymentCategory::class, 'category_id');
    }

    public function collector()
    {
        return $this->belongsTo(PaymentCollector::class, 'collector_id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'status_id');
    }

    public function paymentMode()
    {
        return $this->belongsTo(PaymentMode::class, 'mode_id');
    }
}
