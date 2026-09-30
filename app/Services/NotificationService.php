<?php

namespace App\Services;

use App\Mail\DonationConfirmation;
use App\Mail\FormSubmissionReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Admin email recipient
     */
    protected string $adminEmail;

    /**
     * Admin CC email
     */
    protected string $adminCc;

    public function __construct()
    {
        $this->adminEmail = config('mail.admin_recipient', 'admin@civitas.ch');
        $this->adminCc = config('mail.admin_cc', 'admin@civitas.ch');
    }

    /**
     * Send donation confirmation to donor
     *
     * @param array $donationData
     * @return bool
     */
    public function sendDonationConfirmation(array $donationData): bool
    {
        try {
            Mail::to($donationData['email'])
                ->send(new DonationConfirmation($donationData));

            Log::info('Donation confirmation sent', [
                'email' => $donationData['email'],
                'amount' => $donationData['amount'] ?? null,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send donation confirmation', [
                'error' => $e->getMessage(),
                'email' => $donationData['email'] ?? 'unknown',
            ]);

            return false;
        }
    }

    /**
     * Send notification to admin about new donation
     *
     * @param array $donationData
     * @return bool
     */
    public function notifyAdminNewDonation(array $donationData): bool
    {
        try {
            Mail::to($this->adminEmail)
                ->cc($this->adminCc)
                ->send(new DonationConfirmation($donationData));

            Log::info('Admin notified of new donation', [
                'admin_email' => $this->adminEmail,
                'donor_email' => $donationData['email'] ?? 'unknown',
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to notify admin of donation', [
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Send form submission notification to admin
     *
     * @param array $formData
     * @return bool
     */
    public function sendFormSubmissionNotification(array $formData): bool
    {
        try {
            Mail::to($this->adminEmail)
                ->cc($this->adminCc)
                ->send(new FormSubmissionReceived($formData));

            Log::info('Form submission notification sent', [
                'form_type' => $formData['source_page'] ?? 'unknown',
                'submitter_email' => $formData['email'] ?? 'unknown',
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send form submission notification', [
                'error' => $e->getMessage(),
                'form_data' => $formData,
            ]);

            return false;
        }
    }

    /**
     * Send membership confirmation
     *
     * @param array $membershipData
     * @return bool
     */
    public function sendMembershipConfirmation(array $membershipData): bool
    {
        try {
            // Send to member
            Mail::to($membershipData['email'])
                ->send(new \App\Mail\MembershipConfirmation($membershipData));

            // Notify admin
            Mail::to($this->adminEmail)
                ->cc($this->adminCc)
                ->send(new \App\Mail\MembershipConfirmation($membershipData));

            Log::info('Membership confirmation sent', [
                'email' => $membershipData['email'],
                'type' => $membershipData['amount_type'] ?? null,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send membership confirmation', [
                'error' => $e->getMessage(),
                'email' => $membershipData['email'] ?? 'unknown',
            ]);

            return false;
        }
    }

    /**
     * Send a generic notification email
     *
     * @param string $to
     * @param string $subject
     * @param string $content
     * @param array $options
     * @return bool
     */
    public function sendGenericNotification(
        string $to,
        string $subject,
        string $content,
        array $options = []
    ): bool {
        try {
            $mail = Mail::to($to);

            if (isset($options['cc'])) {
                $mail->cc($options['cc']);
            }

            if (isset($options['bcc'])) {
                $mail->bcc($options['bcc']);
            }

            $mail->send(new \Illuminate\Mail\Message(function ($message) use ($subject, $content) {
                $message->subject($subject);
                $message->setBody($content, 'text/html');
            }));

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send generic notification', [
                'error' => $e->getMessage(),
                'to' => $to,
                'subject' => $subject,
            ]);

            return false;
        }
    }
}
