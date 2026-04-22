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

class ReservationAdmin extends Mailable
{

    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation|Reservation_appart $reservation)
    {
        if ($reservation instanceof Reservation) {
            $this->reservation = $reservation;
        } elseif ($reservation instanceof Reservation_appart) {
            $this->reservation = $reservation;
        }
    }

    public function build()
    {
        return $this->from('fandaexpresscg@gmail.com', 'Fanda-express')
            ->subject('Nouvelle réservation reçue')
            ->markdown('emails.admin_reserv');
    }
}
