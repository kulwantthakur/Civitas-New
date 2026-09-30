<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_password'    => ['required', new MatchOldPassword],
            'new_password'        => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['required', 'same:new_password'],
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
            'current_password.required'     => 'Veuillez entrer votre mot de passe actuel.',
            'new_password.required'         => 'Veuillez entrer un nouveau mot de passe.',
            'new_password.min'              => 'Le nouveau mot de passe doit contenir au moins 8 caractères.',
            'new_confirm_password.required' => 'Veuillez confirmer le nouveau mot de passe.',
            'new_confirm_password.same'     => 'La confirmation ne correspond pas au nouveau mot de passe.',
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
            'current_password'     => 'Mot de passe actuel',
            'new_password'         => 'Nouveau mot de passe',
            'new_confirm_password' => 'Confirmation du nouveau mot de passe',
        ];
    }
}
