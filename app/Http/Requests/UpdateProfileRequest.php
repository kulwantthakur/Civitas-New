<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:50'],
            'lastname'  => ['required', 'string', 'max:50'],
            'gender'    => ['required', 'in:mr,mrs'],
            'mobile'    => ['nullable', 'string', 'max:20'],
            'country'   => ['nullable', 'string', 'max:50'],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user() ? $this->user()->id : null)],
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
            'name.required'      => 'Veuillez entrer votre nom.',
            'name.max'           => 'Le nom ne peut pas dépasser 255 caractères.',
            'firstname.required' => 'Veuillez entrer votre prénom.',
            'firstname.max'      => 'Le prénom ne peut pas dépasser 50 caractères.',
            'lastname.required'  => 'Veuillez entrer votre nom de famille.',
            'lastname.max'       => 'Le nom de famille ne peut pas dépasser 50 caractères.',
            'gender.required'    => 'Veuillez sélectionner un genre.',
            'gender.in'          => 'Le genre sélectionné est invalide.',
            'mobile.max'         => 'Le numéro de mobile ne peut pas dépasser 20 caractères.',
            'country.max'        => 'Le pays ne peut pas dépasser 50 caractères.',
            'email.required'     => 'Veuillez entrer votre adresse e-mail.',
            'email.email'        => 'Veuillez entrer une adresse e-mail valide.',
            'email.unique'       => 'Cette adresse e-mail est déjà utilisée.',
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
            'name'      => 'Nom',
            'firstname' => 'Prénom',
            'lastname'  => 'Nom de famille',
            'gender'    => 'Genre',
            'mobile'    => 'Mobile',
            'country'   => 'Pays',
            'email'     => 'Email',
        ];
    }
}
