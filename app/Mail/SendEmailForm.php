<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class SendEmailForm extends Mailable
{
    use Queueable, SerializesModels;
    public $fromEmail;
    public $name;
    public $mobile;
    public $extra;
    public $message;
    public $subject;
    public $emailTemplate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromEmail, $name, $mobile, $extra, $subject, $message, $emailTemplate)
    {
        $this->fromEmail = $fromEmail;
        $this->name = $name;
        $this->mobile = $mobile;
        $this->extra = $extra;
        $this->message = $message;
        $this->subject = $subject;
        $this->emailTemplate = $emailTemplate;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from($this->fromEmail)
            ->subject($this->subject)
            ->markdown('emails.' . $this->emailTemplate . '_template')
            ->with(['name' => $this->name, 'message' => $this->message, 'email' => $this->extra, 'subject' => $this->subject]);
        return $email;
    }
}
