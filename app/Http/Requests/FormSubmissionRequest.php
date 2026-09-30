<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSubmissionRequest extends FormRequest
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
        return [
            'gender'            => 'required|in:mr,mrs',
            'email'             => 'required|email|max:255',
            'firstname'         => 'required|max:255',
            'lastname'          => 'required|max:255',
            'address'           => 'nullable|string|max:255',
            'post_code'         => 'nullable|string|max:20',
            'canton_province'   => 'nullable|string|max:100',
            'country'           => 'nullable|string|max:100',
            'comment'           => 'nullable|string|max:2000',
            'analyses_opinions' => 'nullable|boolean',
            'events_civitas'    => 'nullable|boolean',
            'news'              => 'nullable|boolean',
            'bulletin'          => 'nullable|boolean',
            'romkurier'         => 'nullable|boolean',
            'events_amissfs'    => 'nullable|boolean',
            'agree_terms'       => 'required|accepted',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'gender.required'      => 'Veuillez sélectionner votre titre.',
            'gender.in'            => 'Le titre sélectionné est invalide.',
            'email.required'       => 'Veuillez entrer votre adresse e-mail.',
            'email.email'          => 'Veuillez entrer une adresse e-mail valide.',
            'firstname.required'   => 'Veuillez entrer votre prénom.',
            'lastname.required'    => 'Veuillez entrer votre nom de famille.',
            'agree_terms.required' => 'Vous devez accepter les conditions.',
            'agree_terms.accepted' => 'Vous devez accepter les conditions.',
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
            'gender'            => 'titre',
            'email'             => 'adresse e-mail',
            'firstname'         => 'prénom',
            'lastname'          => 'nom de famille',
            'address'           => 'adresse',
            'post_code'         => 'code postal',
            'canton_province'   => 'canton/province',
            'country'           => 'pays',
            'analyses_opinions' => 'analyses et opinions',
            'events_civitas'    => 'événements Civitas',
            'news'              => 'actualités',
            'bulletin'          => 'bulletin',
            'romkurier'         => 'Rom-Kurier',
            'events_amissfs'    => 'événements Amis-SFS',
            'agree_terms'       => 'conditions',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // Convert checkbox values to boolean
        $booleanFields = [
            'analyses_opinions',
            'events_civitas',
            'news',
            'bulletin',
            'romkurier',
            'events_amissfs',
        ];

        foreach ($booleanFields as $field) {
            if ($this->has($field)) {
                $this->merge([
                    $field => filter_var($this->input($field), FILTER_VALIDATE_BOOLEAN),
                ]);
            }
        }
    }
}
