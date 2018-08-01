<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailListener extends Mailable
{
    use Queueable, SerializesModels;

    private $form;
    private $nameEntry;
    private $subjectName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form, $nameEntry, $subjectName)
    {
        $this->form = $form;
        $this->nameEntry = $nameEntry;
        $this->subjectName = $subjectName;
    }

    /**
     * Build the message.
     *
     * @return $this View
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject($this->subjectName)
            ->view('emails.email')->with([
                'form' => $this->form,
                'nameEntry' => $this->nameEntry
            ]);
    }
}
