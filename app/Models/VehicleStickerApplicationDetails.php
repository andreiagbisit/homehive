<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleStickerApplicationDetails extends Model
{
    use HasFactory;

    // Define the table name (if it's not pluralized automatically by Laravel)
    protected $table = 'vehicle_sticker_application_details';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'registered_vehicles',
        'vehicle_sticker_fee',
        'hex_code',
    ];

    // Optionally, specify any default values or attribute casts if needed
    protected $casts = [
        'vehicle_sticker_fee' => 'decimal:2', // Ensures the fee has two decimal places
    ];
}
