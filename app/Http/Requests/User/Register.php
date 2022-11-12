<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Rules\Register\EmailRule;
use App\Rules\Register\EmailWasUsed;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\Auth\IRegisterUser;

/**
 * @link RegisterRequestOA
 */
class Register extends FormRequest implements IRegisterUser
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                new EmailRule(),
                new EmailWasUsed(),
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => 'required|in:ADMIN,TRAINER,SPORTSMAN',
        ];
    }

    public function getUsername()
    {
        return $this->input('name');
    }

    public function getUserSurname()
    {
        return $this->input('surname');
    }

    public function getEmail()
    {
        return $this->input('email');
    }

    public function getUserPassword()
    {
        return $this->input('password');
    }

    public function getRoles()
    {
        return $this->input('roles');
    }
}
