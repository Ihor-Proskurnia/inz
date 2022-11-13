<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;

class ChangePasswordRequest extends FormRequest implements IChangeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => [
                'required',
            ],
            'password' => [
                'required',
                'confirmed',
                'different:old_password',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
        ];
    }

    public function getUserPassword()
    {
        return $this->input('password');
    }
}
