<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Donation;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    /** @var Donation */
    protected $modelDonation;
    /** @var Subscription */
    protected $modelSubscription;

    public function __construct(Donation $DonationM, Subscription $SubscriptionM)
    {
        $this->modelDonation = $DonationM;
        $this->modelSubscription = $SubscriptionM;
    }

    /**
     * Create payment via Payrexx.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function createPayment(Request $request)
    {
        $apiKey = config('services.payrexx.api_key');
        $instanceName = config('services.payrexx.instance');

        if (!$apiKey || !$instanceName) {
            Log::error('❌ Payrexx credentials are not configured properly.');
            return response()->json(['error' => 'Payment gateway not configured.'], 500);
        }

        // Log environment mode based on app environment
        if (app()->environment('local', 'staging')) {
            Log::info('✅ Payrexx is running in TEST mode.');
        } else {
            Log::info('🚨 Payrexx is in LIVE mode.');
        }

        $donation = Donation::findOrFail($request->donation_id);

        // Create subscription record
        $subscription = $this->modelSubscription::create([
            'donation_id' => $donation->id,
            'user_email' => $donation->email ?? 'guest@example.com',
            'amount' => $donation->amount,
            'currency' => 'CHF',
            'status' => 'pending',
        ]);

        // Use APP_URL from config for proper environment handling
        $baseUrl = config('app.url');

        $successUrl = $baseUrl . '/payment/success/' . $subscription->id;
        $failUrl = $baseUrl . '/payment/fail/' . $subscription->id;
        $cancelUrl = $failUrl;

        // Prepare the data (no apiSignature here!)
        $formParams = [
            'amount' => intval($subscription->amount * 100),
            'currency' => $subscription->currency,
            'title' => 'Donation Payment',
            'purpose' => 'Support our cause',
            'successRedirectUrl' => $successUrl,
            'failedRedirectUrl' => $failUrl,
            'cancelRedirectUrl' => $cancelUrl,
        ];

        Log::info('🔍 Sending request to Payrexx:', $formParams);

        try {
            $client = new Client(['base_uri' => 'https://api.payrexx.com/v1.0/']);

            // `instance` goes in the query string
            $response = $client->post("Gateway?instance={$instanceName}", [
                'headers' => [
                    'Accept' => 'application/json',
                    'X-API-KEY' => $apiKey,
                ],
                'form_params' => $formParams,
            ]);

            $body = json_decode($response->getBody(), true);
            Log::info('📦 Full Payrexx response:', $body);
            $gateway = $body['data'][0] ?? null;

            if (!$gateway || !isset($gateway['link'])) {
                Log::error('❌ Invalid Payrexx response: ' . $response->getBody());
                return response()->json(['error' => 'Invalid response from payment gateway.'], 500);
            }

            // Save Payrexx info
            $subscription->update([
                'payrexx_id' => $gateway['id'] ?? null,
                'payrexx_link' => $gateway['link'] ?? null,
                'payrexx_status' => $gateway['status'] ?? null,
                'payrexx_reference' => $gateway['referenceId'] ?? null,
                'payrexx_raw_response' => json_encode($gateway),
            ]);

            return redirect()->away($gateway['link']);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $body = $response ? $response->getBody()->getContents() : 'No response body';

            Log::error('❌ Payrexx ClientException: ' . $e->getMessage());
            Log::error('❌ Response body: ' . $body);
            return response()->json(['error' => 'Payment creation failed.', 'details' => $body], 500);
        } catch (\Exception $e) {
            Log::error('❌ Payrexx Error: ' . $e->getMessage());
            return response()->json(['error' => 'Unexpected error occurred.'], 500);
        }
    }

    /**
     * Payment success page.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function paymentSuccess($id)
    {
        $subscription = $this->modelSubscription::findOrFail($id);

        if ($subscription->status === 'pending') {
            $subscription->update(['status' => 'success']);
        }

        return view('payment.success', compact('subscription'));
    }

    /**
     * Payment fail page.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function paymentFail($id)
    {
        $subscription = $this->modelSubscription::findOrFail($id);

        if ($subscription->status === 'pending') {
            $subscription->update(['status' => 'failed']);
        }

        return view('payment.fail', compact('subscription'));
    }

    /**
     * Handle Payrexx webhook.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleWebhook(Request $request)
    {
        Log::info('📥 Incoming Payrexx webhook', $request->all());

        $data = $request->input('data')[0] ?? null;

        if (!$data || !isset($data['id'])) {
            Log::warning('⚠️ Webhook received without valid data.');
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        $payrexxId = $data['id'];
        $status = $data['status'] ?? null;

        // Find subscription by payrexx_id
        $subscription = Subscription::where('payrexx_id', $payrexxId)->first();

        if (!$subscription) {
            Log::warning("⚠️ No subscription found with payrexx_id: {$payrexxId}");
            return response()->json(['error' => 'Subscription not found'], 404);
        }

        // Update fields
        $subscription->update([
            'payrexx_status' => $status,
            'payrexx_reference' => $data['referenceId'] ?? null,
            'payrexx_raw_response' => json_encode($data),
            'status' => $status === 'confirmed' ? 'success' : ($status === 'cancelled' ? 'failed' : $subscription->status),
        ]);

        Log::info("✅ Subscription #{$subscription->id} updated from webhook with status: {$status}");

        return response()->json(['message' => 'Webhook processed.']);
    }
}
