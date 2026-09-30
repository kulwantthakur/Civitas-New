<?php

namespace App\Mail;

use App\Models\Donation;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DonationConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
        
        // Set sender email
        $this->from('kyriakosdoug4@gmail.com', 'Civitas Suisse');
        $this->replyTo('dougiakiskyr@gmail.com', 'Civitas Suisse Kyriakos');
    }

    public function build()
    {
        try {
            // Get email template from database
            $template = EmailTemplate::getByPaymentMethod($this->donation->payment_method);
            
            // Fallback to default if template not found
            if (!$template) {
                $emailView = $this->getDefaultEmailView();
                $subject = 'Confirmation de votre don - Civitas Suisse';
            } else {
                $emailView = 'emails.dynamic';
                $subject = $template->subject;
            }
            
            $mail = $this->subject($subject)
                        ->view($emailView, [
                            'donation' => $this->donation,
                            'html' => $template->html_content ?? ''
                        ]);

            // Attach PDF only for bulletin
            if ($this->donation->payment_method === 'bulletin' && $template && $template->pdf_attachment) {
                $pdfPath = storage_path('app/public/pdfs/' . $template->pdf_attachment);
                
                if (file_exists($pdfPath)) {
                    $mail->attach($pdfPath, [
                        'as' => 'bulletin_versement.pdf',
                        'mime' => 'application/pdf',
                    ]);
                } else {
                    \Log::warning('Bulletin PDF file not found: ' . $pdfPath);
                }
            }

            return $mail;
        } catch (\Exception $e) {
            \Log::error('Failed to build donation confirmation email: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get default email view as fallback
     */
    private function getDefaultEmailView(): string
    {
        $views = [
            'cash' => 'emails.versement_liquide',
            'bank' => 'emails.virement_bancaire',
            'bulletin' => 'emails.dons_sans_frais',
            'crypto' => 'emails.dons_en_cryptomonnaie',
        ];

        return $views[$this->donation->payment_method] ?? 'emails.versement_liquide';
    }
}
