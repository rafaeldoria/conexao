<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailContact extends Mailable
{
    use Queueable, SerializesModels;
    public $notifiable;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notifiable)
    {
        $this->notifiable = $notifiable;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('home@conexaonerd.com.br')
                ->subject('Nova Mensagem - ConexãoNerd')
                ->markdown('mail.contact.sendContact', [
                    'contact' => $this->notifiable,
                ]);
    }
}
