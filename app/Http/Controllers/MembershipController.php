<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MembershipController extends Controller
{
    protected $modelMembership;

    public function __construct(Membership $MembershipM)
    {
        $this->modelMembership = $MembershipM;
    }

    public function storeMembership(Request $request)
    {
        if ($this->modelMembership->isMembershipValid($request->all())) {
            $newmembership = new Membership();

            $newmembership->amount_type = $request->amount_type;
            $newmembership->amount = (float) $request->amount_type;

            $newmembership->payment_method = $request->payment_method;

            if (Auth::check()) {
                $newmembership->user_id = Auth::user()->user_identifier;
                $newmembership->gender = null;
                $newmembership->firstname = null;
                $newmembership->lastname = null;
                $newmembership->email = null;
            } else {
                $newmembership->user_id = null;
                $newmembership->gender = $request->gender;
                $newmembership->firstname = $request->firstname;
                $newmembership->lastname = $request->lastname;
                $newmembership->email = $request->email;
            }

            $newmembership->notes = $request->notes;

            $newmembership->street = $request->street;
            $newmembership->number = $request->number;
            $newmembership->complement = $request->complement;
            $newmembership->zipcode = $request->zipcode;
            $newmembership->city = $request->city;
            if ($request->payment_method === 'bulletin') {
                $newmembership->country = 'ch-suisse';
            } else {
                $newmembership->country = $request->country;
            }

            $newmembership->start_date = Carbon::now()->toDateString();
            $newmembership->end_date = Carbon::now()->addYear()->toDateString();

            $newmembership->save();

            if ($request->payment_method === 'cash') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('civitas.soutenir_ebanking'),
                    'message' => 'Donation saved, redirecting...'
                ], 200);
            } elseif ($newmembership->payment_method === 'online') {
                return response()->json([
                    'success' => true,
                    'redirect' => route('subscription.createPayment', ['donation_id' => $newmembership->id]),
                    'message' => 'Proceeding to online payment...'
                ]);
            } elseif ($newmembership->payment_method === 'bulletin') {
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
                    'errors' => $this->modelMembership->errors->toArray()
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelMembership->errors);
        }
    }
}
