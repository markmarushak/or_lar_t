<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    private $form;
    private $nameEntry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $nameEntry)
    {
        $this->form = $form;
        $this->nameEntry = $nameEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Få tilbud på Garasje')
            ->view('emails.email')->with([
                'form' => $this->form,
                'nameEntry' => $this->nameEntry
            ]);
    }
}
