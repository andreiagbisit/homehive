<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCollector extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table if it doesn't follow Laravel's naming convention
    protected $table = 'payment_collector';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'collector_gcash_number',
        'gcash_qr_code_path',
    ];
}
