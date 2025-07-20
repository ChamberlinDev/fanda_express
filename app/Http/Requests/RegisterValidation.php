<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nom_hotel'            => 'required|string|max:255',
            'code'                 => 'required|string|max:100|unique:users,code',
            'adresse'              => 'required|string|max:255',
            'description'          => 'required|string|max:500',
            'email'                => 'required|email|unique:users,email',
            'telephone'            => 'required|string|max:20',
            'password'             => 'required|string|min:8|confirmed',
            //
        ];
    }
     public function messages(): array
    {
        return [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
