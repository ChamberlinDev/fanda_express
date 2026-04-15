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

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

  public function __construct(Reservation|Reservation_appart $reservation)
{
    $this->reservation = $reservation;

    // Charger relations seulement si elles existent
    if ($reservation instanceof Reservation) {
        $this->reservation->load('chambre.hotel');
    }
}

    public function build()
    {
        return $this->from('fandaexpresscg@gmail.com', 'Fanda-express')
            ->subject('Confirmation de votre réservation')
            ->view('emails.email_reserv');
    }
}
