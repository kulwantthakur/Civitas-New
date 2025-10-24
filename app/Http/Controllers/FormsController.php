<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmissionReceived;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;


class FormsController extends Controller
{
    protected $modelFormSubmission;

    public function __construct(FormSubmission $FormM)
    {
        $this->modelFormSubmission = $FormM;
    }

    public function storeForm(Request $request)
    {
        if ($this->modelFormSubmission->isFormValid($request->all())) {
            $newform = new FormSubmission();
            $newform->source_page = $request->source_page;

            if (Auth::check()) {
                $newform->user_id = Auth::user()->user_identifier;
                $newform->gender = null;
                $newform->email = null;
                $newform->firstname = null;
                $newform->lastname = null;
            } else {
                $newform->gender = $request->gender;
                $newform->email = $request->email;
                $newform->firstname = $request->firstname;
                $newform->lastname = $request->lastname;
            }

            $newform->address = $request->address;
            $newform->post_code = $request->post_code;
            $newform->canton_province = $request->canton_province;
            $newform->country = $request->country;
            $newform->articles = $request->articles;
            $newform->reference = $request->reference;
            $newform->titre_detail = $request->titre_detail;
            $newform->quantity = $request->quantity;
            $newform->price = $request->price;

            $newform->comment = $request->comment;

            $newform->analyses_opinions = $request->has('analyses_opinions') ? $request->analyses_opinions : '0';
            $newform->events_civitas = $request->has('events_civitas') ? $request->events_civitas : '0';
            $newform->news = $request->has('news') ? $request->news : '0';

            $newform->bulletin = $request->has('bulletin') ? $request->bulletin : '0';
            $newform->romkurier = $request->has('romkurier') ? $request->romkurier : '0';
            $newform->events_amissfs = $request->has('events_amissfs') ? $request->events_amissfs : '0';

            $newform->agree_terms = $request->has('agree_terms') ? $request->agree_terms : '0';

            $newform->save();

            Mail::to('kyriakosdoug4@gmail.com')
                ->cc('kyriakosdoug4@gmail.com')
                ->send(new FormSubmissionReceived($newform));


            return response()->json(['success' => true, 'message' => 'Form saved'], 200);
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $this->modelFormSubmission->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($this->modelFormSubmission->errors);
        }
    }

    public function submitTicket(Request $request)
    {
        $formSubmission = new FormSubmission();

        // Validate input
        if (!$formSubmission->isFormValid($request->all())) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $formSubmission->errors
                ]);
            }
            return redirect()->back()->withInput()->withErrors($formSubmission->errors);
        }

        // Prepare data for saving
        $data = $request->only($formSubmission->getFillable());

        // Fill user info from Auth if logged in
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
            $data['firstname'] = Auth::user()->firstname;
            $data['lastname'] = Auth::user()->lastname;
            $data['gender'] = Auth::user()->gender;
            $data['email'] = Auth::user()->email;
        }

        // Save form submission to DB
        $savedSubmission = $formSubmission->create($data);

        // Send email
        Mail::to('kyriakosdoug4@gmail.com')
            ->cc('kyriakosdoug4@gmail.com')
            ->send(new FormSubmissionReceived($savedSubmission));

        return response()->json([
            'success' => true,
            'message_el' => 'Your request has been successfully submitted.'
        ]);
    }
}
