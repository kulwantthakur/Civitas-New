<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Mail\DonationConfirmation;


class DonationController extends Controller
{
    protected $modelDonation;

    public function __construct(Donation $DonationM)
    {
        $this->modelDonation = $DonationM;
    }

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

            if (!empty($newdonation->email)) {
                Mail::to($newdonation->email)->send(new DonationConfirmation($newdonation));
            }

            if ($request->payment_method === 'cash') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_ebanking'),
                    'message' => 'Donation saved, redirecting...'
                ], 200);
            } elseif ($newdonation->payment_method === 'online') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('subscription.createPayment', ['donation_id' => $newdonation->id]),
                    'message' => 'Proceeding to online payment...'
                ]);
            } elseif ($newdonation->payment_method === 'bulletin') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_receipt'),
                    'message' => 'Donation saved, redirecting...'
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
