<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\VehicleStickerApplication;

class VehicleRegistrationConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(VehicleStickerApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Vehicle Registration and Payment Confirmed')
                    ->view('emails.vehicle-registration-confirmed');
    }
}