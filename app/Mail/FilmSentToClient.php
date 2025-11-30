<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FilmSentToClient extends Mailable
{
    public $film;

public function __construct($film)
{
    $this->film = $film;
}

public function build()
{
    return $this->subject("Votre film est désormais disponible !")
                ->markdown('emails.film.sent');
}
}
