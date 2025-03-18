<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class groupCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $group;

    /**
     * Crée une nouvelle instance de message.
     *
     * @param $user
     */
    public function __construct($group)
    {
        $this->group = $group;
    }

    /**
     * Définir le contenu du message.
     */
    public function build()
    {
        return $this->view('mail.groupCreateContent')
            ->with([
                'groupName' => $this->group->name,
            ]);
    }

    /**
     * Récupérer les pièces jointes pour le message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
