<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'contact_no' => ['required', 'string', 'max:20'],
            'street' => ['required', 'string', 'max:255'],
            'block_no' => ['required', 'integer'],
            'lot_no' => ['required', 'integer'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'username' => 'username',
            'first_name' => 'first name',
            'middle_name' => 'middle name',
            'last_name' => 'last name',
            'birthdate' => 'birthdate',
            'email' => 'email address',
            'contact_no' => 'contact number',
            'street' => 'street',
            'block_no' => 'house block number',
            'lot_no' => 'house lot number',
            'password' => 'password',
        ];
    }
}
