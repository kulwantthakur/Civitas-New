<?php

namespace App\Services;

use App\Models\Donation;
use App\Models\Membership;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    /**
     * Payrexx API instance name
     */
    protected string $instanceName;

    /**
     * Payrexx API secret
     */
    protected string $apiSecret;

    /**
     * Base URL for the application
     */
    protected string $baseUrl;

    public function __construct()
    {
        $this->instanceName = config('services.payrexx.instance', 'civitas');
        $this->apiSecret = config('services.payrexx.secret', '');
        $this->baseUrl = config('app.url');
    }

    /**
     * Create a Payrexx payment gateway
     *
     * @param array $data Payment data
     * @return array|null Gateway response or null on failure
     */
    public function createGateway(array $data): ?array
    {
        try {
            $payrexx = new \Payrexx\Payrexx($this->instanceName, $this->apiSecret);
            
            $gateway = new \Payrexx\Models\Request\Gateway();
            $gateway->setAmount($data['amount'] * 100); // Convert to cents
            $gateway->setCurrency('CHF');
            $gateway->setSuccessRedirectUrl($this->baseUrl . '/payment/success');
            $gateway->setFailedRedirectUrl($this->baseUrl . '/payment/failed');
            $gateway->setCancelRedirectUrl($this->baseUrl . '/payment/cancel');
            
            if (isset($data['purpose'])) {
                $gateway->setPurpose($data['purpose']);
            }
            
            if (isset($data['reference_id'])) {
                $gateway->setReferenceId($data['reference_id']);
            }
            
            // Add payer information if available
            if (isset($data['email'])) {
                $gateway->addField('email', $data['email']);
            }
            if (isset($data['firstname'])) {
                $gateway->addField('forename', $data['firstname']);
            }
            if (isset($data['lastname'])) {
                $gateway->addField('surname', $data['lastname']);
            }
            
            $response = $payrexx->create($gateway);
            
            Log::info('Payrexx gateway created', [
                'gateway_id' => $response->getId(),
                'reference_id' => $data['reference_id'] ?? null,
            ]);
            
            return [
                'id' => $response->getId(),
                'hash' => $response->getHash(),
                'link' => $response->getLink(),
                'status' => $response->getStatus(),
            ];
        } catch (\Exception $e) {
            Log::error('Payrexx gateway creation failed', [
                'error' => $e->getMessage(),
                'data' => $data,
            ]);
            
            return null;
        }
    }

    /**
     * Process a webhook from Payrexx
     *
     * @param array $payload Webhook payload
     * @return bool Success status
     */
    public function processWebhook(array $payload): bool
    {
        try {
            $transactionId = $payload['transaction']['id'] ?? null;
            $status = $payload['transaction']['status'] ?? null;
            $referenceId = $payload['transaction']['referenceId'] ?? null;
            
            if (!$transactionId || !$status) {
                Log::warning('Invalid webhook payload', ['payload' => $payload]);
                return false;
            }
            
            // Find and update the subscription
            $subscription = Subscription::where('payrexx_id', $transactionId)->first();
            
            if ($subscription) {
                $subscription->update([
                    'status' => $this->mapPayrexxStatus($status),
                ]);
                
                Log::info('Subscription updated via webhook', [
                    'subscription_id' => $subscription->id,
                    'status' => $status,
                ]);
                
                return true;
            }
            
            Log::warning('Subscription not found for webhook', [
                'transaction_id' => $transactionId,
                'reference_id' => $referenceId,
            ]);
            
            return false;
        } catch (\Exception $e) {
            Log::error('Webhook processing failed', [
                'error' => $e->getMessage(),
                'payload' => $payload,
            ]);
            
            return false;
        }
    }

    /**
     * Map Payrexx status to internal status
     *
     * @param string $payrexxStatus
     * @return string
     */
    protected function mapPayrexxStatus(string $payrexxStatus): string
    {
        return match ($payrexxStatus) {
            'confirmed' => 'completed',
            'waiting' => 'pending',
            'cancelled' => 'cancelled',
            'declined' => 'failed',
            'refunded' => 'refunded',
            'partially-refunded' => 'partially_refunded',
            default => 'unknown',
        };
    }

    /**
     * Get payment methods available
     *
     * @return array
     */
    public function getPaymentMethods(): array
    {
        return [
            'online' => [
                'label' => 'Paiement en ligne',
                'description' => 'Carte de crédit, PostFinance, TWINT',
            ],
            'cash' => [
                'label' => 'Espèces',
                'description' => 'Paiement en espèces',
            ],
            'bank' => [
                'label' => 'Virement bancaire',
                'description' => 'Virement sur notre compte bancaire',
            ],
            'bulletin' => [
                'label' => 'Bulletin de versement',
                'description' => 'Par bulletin de versement postal',
            ],
            'crypto' => [
                'label' => 'Cryptomonnaie',
                'description' => 'Bitcoin, Ethereum, etc.',
            ],
        ];
    }

    /**
     * Calculate donation amount based on type
     *
     * @param string $amountType
     * @param float|null $customAmount
     * @return float
     */
    public function calculateDonationAmount(string $amountType, ?float $customAmount = null): float
    {
        if ($amountType === 'custom' && $customAmount !== null) {
            return max(0.01, $customAmount);
        }

        $amounts = [
            '25' => 25.00,
            '50' => 50.00,
            '120' => 120.00,
            '500' => 500.00,
        ];

        return $amounts[$amountType] ?? 0.00;
    }

    /**
     * Calculate membership amount based on type
     *
     * @param string $amountType
     * @return float
     */
    public function calculateMembershipAmount(string $amountType): float
    {
        $amounts = [
            '30' => 30.00,  // Étudiant/AVS
            '45' => 45.00,  // Membre individuel
            '60' => 60.00,  // Couple
            '80' => 80.00,  // Bienfaiteur
        ];

        return $amounts[$amountType] ?? 45.00;
    }
}
