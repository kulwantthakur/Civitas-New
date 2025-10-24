<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\FormSubmission;
use Illuminate\Contracts\Queue\ShouldQueue;


class FormSubmissionReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $submission;

    public function __construct(FormSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('New Form Submission')
                    ->markdown('emails.formsubmission');
    }
}
