<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentCategory extends Model
{
    use HasFactory, SoftDeletes;

    // Specify fillable fields
    protected $table = 'payment_category';
    protected $fillable = [
        'name',
        'hex_code', // Ensure hex_code is added here
    ];
}
