<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\FacilityReservation;

class FacilityReservationPaidNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(FacilityReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->view('emails.facility_reservation_paid')
                    ->subject('Your Facility Reservation is Marked as Paid')
                    ->with([
                        'reservation' => $this->reservation,
                    ]);
    }
}
