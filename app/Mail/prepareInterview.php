<?php

namespace App\Mail;

use App\Models\Santri;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class prepareInterview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $santri_id;
    public $santri_name;
    public $santri_email;

    public function __construct($id)
    {
        $santri = Santri::find($id);
        $this->santri_id = $id;
        $this->santri_name = $santri->nama_santri;
        $this->santri_email = $santri->email_santri;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Pendaftaran Terkirim] PPM Syafi`ur Rohman',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'email.prepareInterview',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))->view('email.prepareInterview', ['santri_id' => $this->santri_id, 'santri_email' => $this->santri_email, 'name' => $this->santri_name]);
    }
}
