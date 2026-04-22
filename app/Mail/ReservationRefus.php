<?php

namespace App\Mail;

use App\Models\Reservation;
use App\Models\Reservation_appart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationRefus extends Mailable
{
    use Queueable, SerializesModels;


    public $reservation;

    public function __construct(Reservation|Reservation_appart $reservation)
    {
        $this->reservation = $reservation;

        if ($reservation instanceof Reservation_appart) {
            $this->reservation->load('appartement');
        } else {
            $this->reservation->load('chambre.hotel');
        }
    }
    public function build()
    {
        return $this->subject('Votre réservation a été refusée')
            ->view('emails.refus_reser');
    }
}
