<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'amount_type'    => 'required|in:25,50,120,500,custom',
            'amount'         => 'required_if:amount_type,custom|nullable|numeric|min:0.01',
            'billing_cycle'  => 'required|in:monthly,annual',
            'payment_method' => 'required|in:cash,online,crypto,bank,bulletin',
            'email'          => 'required|email|max:255',
            'gender'         => 'nullable|in:mr,mrs',
            'notes'          => 'nullable|string',
        ];

        // Additional rules for non-bulletin payments
        if ($this->input('payment_method') !== 'bulletin') {
            $rules = array_merge($rules, [
                'firstname'  => 'required|string|max:255',
                'lastname'   => 'required|string|max:255',
                'street'     => 'required|string|max:150',
                'number'     => 'required|string|max:20',
                'complement' => 'nullable|string|max:150',
                'zipcode'    => 'required|string|max:20',
                'city'       => 'required|string|max:100',
                'country'    => 'required|in:ch-suisse,fr-france,de-allemagne,i-italie,a-autriche,qc-quebec,world',
            ]);
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'amount_type.required'    => 'Veuillez sélectionner un montant.',
            'amount_type.in'          => 'Le type de montant sélectionné est invalide.',
            'amount.required_if'      => 'Veuillez entrer un montant personnalisé.',
            'amount.numeric'          => 'Le montant doit être un nombre.',
            'amount.min'              => 'Le montant minimum est de 0.01 CHF.',
            'billing_cycle.required'  => 'Veuillez sélectionner une fréquence de paiement.',
            'billing_cycle.in'        => 'La fréquence de paiement sélectionnée est invalide.',
            'payment_method.required' => 'Veuillez choisir un mode de paiement.',
            'payment_method.in'       => 'Le mode de paiement sélectionné est invalide.',
            'email.required'          => 'Veuillez entrer votre adresse e-mail.',
            'email.email'             => 'Veuillez entrer une adresse e-mail valide.',
            'firstname.required'      => 'Veuillez entrer votre prénom.',
            'lastname.required'       => 'Veuillez entrer votre nom de famille.',
            'street.required'         => 'Veuillez entrer votre rue.',
            'number.required'         => 'Veuillez entrer votre numéro.',
            'zipcode.required'        => 'Veuillez entrer votre code postal.',
            'city.required'           => 'Veuillez entrer votre ville.',
            'country.required'        => 'Veuillez sélectionner votre pays.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'amount_type'    => 'type de montant',
            'amount'         => 'montant',
            'billing_cycle'  => 'fréquence de paiement',
            'payment_method' => 'mode de paiement',
            'email'          => 'adresse e-mail',
            'firstname'      => 'prénom',
            'lastname'       => 'nom de famille',
            'street'         => 'rue',
            'number'         => 'numéro',
            'zipcode'        => 'code postal',
            'city'           => 'ville',
            'country'        => 'pays',
        ];
    }
}
