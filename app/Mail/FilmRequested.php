<?php

namespace App\Mail;

use App\Models\Film;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FilmRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $film;

    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    public function build()
    {
        return $this->subject("🎬 Nouvelle demande de film")
                    ->view('emails.film-requested');
    }
}
