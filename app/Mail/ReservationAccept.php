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

class ReservationAccept extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation|Reservation_appart $reservation)
    {
            if ($reservation instanceof Reservation_appart) {
                $this->reservation->load('appartement');
            }   
            else {
                $this->reservation->load('chambre.hotel');
            }

    }

    public function build()
    {
        return $this->subject('Votre réservation a été confirmée 🏨')
                    ->view('emails.accept_reser');
    }
}
