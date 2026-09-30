<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationConfirmation;


class DonationController extends Controller
{
    /** @var Donation */
    protected $modelDonation;

    public function __construct(Donation $DonationM)
    {
        $this->modelDonation = $DonationM;
    }

    /**
     * Store a new donation.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function storeDonation(Request $request)
    {
        if ($this->modelDonation->isDonationValid($request->all())) {
            $newdonation = new Donation();

            $newdonation->amount_type = $request->amount_type;

            if ($request->amount_type === 'custom') {
                $newdonation->amount = $request->amount;
            } else {
                $newdonation->amount = (float) $request->amount_type;
            }
            $cycle = $request->input('billing_cycle');
            if (!in_array($cycle, ['monthly', 'annual'], true)) {
                $cycle = 'monthly';
            }
            $newdonation->billing_cycle = $cycle;
            $newdonation->payment_method = $request->payment_method;

            if (Auth::check()) {
                $newdonation->user_id = Auth::user()->user_identifier;
                $newdonation->gender = null;
                $newdonation->firstname = null;
                $newdonation->lastname = null;
                $newdonation->email = null;
            } else {
                $newdonation->user_id = null;
                $newdonation->gender = $request->gender;
                $newdonation->firstname = $request->firstname;
                $newdonation->lastname = $request->lastname;
                $newdonation->email = $request->email;
            }

            $newdonation->notes = $request->notes;

            $newdonation->street = $request->street;
            $newdonation->number = $request->number;
            $newdonation->complement = $request->complement;
            $newdonation->zipcode = $request->zipcode;
            $newdonation->city = $request->city;
            if ($request->payment_method === 'bulletin') {
                $newdonation->country = 'ch-suisse';
            } else {
                $newdonation->country = $request->country;
            }

            $newdonation->save();

            // Get user email - either from authenticated user or from form
            $userEmail = Auth::check() ? Auth::user()->email : $newdonation->email;

            // Send confirmation email with payment instructions for all payment methods
            if (!empty($userEmail)) {
                try {
                    Mail::to($userEmail)->send(new DonationConfirmation($newdonation));
                } catch (\Exception $e) {
                    \Log::error('Failed to send donation confirmation email: ' . $e->getMessage());
                }
            }

            // Redirect based on payment method
            if ($request->payment_method === 'cash') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_cash'),
                    'message' => 'Donation saved, redirecting to payment instructions...'
                ], 200);
            } elseif ($newdonation->payment_method === 'online') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('subscription.createPayment', ['donation_id' => $newdonation->id]),
                    'message' => 'Proceeding to online payment...'
                ]);
            } elseif ($newdonation->payment_method === 'bank') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_banking'),
                    'message' => 'Donation saved, redirecting to payment instructions...'
                ], 200);
            } elseif ($newdonation->payment_method === 'bulletin') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_receipt'),
                    'message' => 'Donation saved, redirecting to payment instructions...'
                ], 200);
            } elseif ($newdonation->payment_method === 'crypto') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_crypto'),
                    'message' => 'Donation saved, redirecting to payment instructions...'
                ], 200);
            }

            return response()->json(['success' => true, 'message' => 'Donation saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelDonation->errors->toArray()
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelDonation->errors);
        }
    }
}
