<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    use HasFactory;
    protected $table = 'payment_mode';

    public function payments()
    {
        return $this->hasMany(Payment::class, 'mode_id');
    }
}
