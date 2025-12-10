<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade\Pdf;

class DonationConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function build()
    {
        if($this->donation->payment_method === 'cash'){
            $pdf = Pdf::loadView('pdf-template.versement_liquide', [
                'donation' => $this->donation
            ]);
        } elseif($this->donation->payment_method === 'bank'){
            $pdf = Pdf::loadView('pdf-template.virement_bancaire', [
                'donation' => $this->donation
            ]);
        } else{
            $pdf = Pdf::loadView('pdf-template.dons_sans_frais', [
                'donation' => $this->donation
            ]);
        }
        $pdfOutput = $pdf->output();

        return $this->subject('Thank you for your donation!')
                    ->markdown('emails.confirmation')
                    ->attachData($pdfOutput, 'donation_receipt.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
