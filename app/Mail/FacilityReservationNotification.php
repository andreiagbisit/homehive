<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\FacilityReservation;

class FacilityReservationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $admin;

    public function __construct(FacilityReservation $reservation, $admin)
    {
        $this->reservation = $reservation;
        $this->admin = $admin;
    }

    public function build()
    {
        return $this->view('emails.facility_reservation')
                    ->subject('New Facility Reservation')
                    ->with([
                        'reservation' => $this->reservation,
                        'admin' => $this->admin,
                    ]);
    }
}
