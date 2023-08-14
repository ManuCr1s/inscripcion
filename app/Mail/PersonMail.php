<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PersonMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;
    public $user;
    public $pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje,$user,$pass)
    {
        $this->mensaje = $mensaje;
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Entrega de Credenciales de acceso',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.emailPass',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
