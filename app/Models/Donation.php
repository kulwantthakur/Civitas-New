<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Donation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'donations';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'amount',
        'payment_method',
        'country',
        'gender',
        'amount_type',
        'billing_cycle',
        'notes',
        'street',
        'number',
        'complement',
        'zipcode',
        'city',
        'status',
    ];

    /**
     * Scope for active records.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public $editRules = [];
    public $errors;

    public function isDonationValid($data)
    {
        $rules = [
            'amount_type'   => 'required|in:25,50,120,500,custom',
            'amount'        => 'required_if:amount_type,custom|nullable|numeric|min:0.01',
            'billing_cycle'  => 'required|in:monthly,annual',
            'payment_method' => 'required|in:cash,online,crypto,bank,bulletin',
            'email'         => 'required|email|max:255',
            'gender'        => 'nullable|in:mr,mrs',
            'notes'         => 'nullable|string',
        ];

        if (!isset($data['payment_method']) || $data['payment_method'] !== 'bulletin') {
            $rules = array_merge($rules, [
                'firstname'   => 'required|string|max:255',
                'lastname'    => 'required|string|max:255',
                'street'      => 'required|string|max:150',
                'number'      => 'required|string|max:20',
                'complement'  => 'nullable|string|max:150',
                'zipcode'     => 'required|string|max:20',
                'city'        => 'required|string|max:100',
                'country'     => 'required|in:ch-suisse,fr-france,de-allemagne,i-italie,a-autriche,qc-quebec,world',
            ]);
        }

        $validation = Validator::make($data, $rules);

        $this->errors = $validation->errors();

        if ($validation->fails()) {
            $paymentMethod = $data['payment_method'] ?? null;
            if ($paymentMethod !== 'bulletin') {
                $personalFields = [
                    'firstname' => 'prénom',
                    'lastname' => 'nom de famille',
                    'email' => 'adresse e-mail'
                ];
                $missingPersonal = array_filter($personalFields, fn($label, $key) => empty($data[$key]), ARRAY_FILTER_USE_BOTH);
                if ($missingPersonal) {
                    $labels = array_values($missingPersonal);
                    $last = array_pop($labels);
                    $msg = $labels
                        ? "Veuillez entrer votre " . implode(', ', $labels) . " et votre $last, svp."
                        : "Veuillez entrer votre $last, svp.";
                    $this->errors->add('personal_info', $msg);
                }
            } else {
                if (empty($data['email'])) {
                    $this->errors->add('personal_info', "Veuillez entrer votre adresse e-mail, svp.");
                }
            }
            if ($paymentMethod !== 'bulletin') {
                $addressFields = [
                    'street' => 'rue',
                    'number' => 'numéro',
                    'zipcode' => 'code postal',
                    'city' => 'ville',
                    'country' => 'pays'
                ];
                $missingAddress = array_filter($addressFields, fn($label, $key) => empty($data[$key]), ARRAY_FILTER_USE_BOTH);
                if ($missingAddress) {
                    $labels = array_values($missingAddress);
                    $last = array_pop($labels);
                    $msg = $labels
                        ? "Veuillez entrer votre " . implode(', ', $labels) . " et votre $last, svp."
                        : "Veuillez entrer votre $last, svp.";
                    $this->errors->add('address_info', $msg);
                }
            }
            if (empty($data['amount_type'])) {
                $this->errors->add('amount_info', 'Veuillez entrer le montant, svp.');
            }
            if (empty($data['payment_method'])) {
                $this->errors->add('payment_info', 'Veuillez choisir un mode de paiement, svp.');
            }

            return false;
        }

        $this->errors = collect();
        return true;
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_identifier');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
