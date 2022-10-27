<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;

class UpdateUserRequest extends FormRequest implements IUpdateUserRequest
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
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => 'required|in:ADMIN,MODERATOR,STORAGE_WORKER,DRIVER',
            'phone' => 'nullable|min:8', // +47 815 XX XXX
            'post_code' => 'nullable|max:5',
            'city' => 'nullable|min:2|max:50',
            'street' => 'nullable|min:2|max:50',
            'bank_account' => 'nullable|min:2|max:50',
            'social_security' => 'nullable|min:2|max:50',
            'salary_per_hour' => 'nullable|numeric',
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

    public function getRoles()
    {
        return $this->input('roles');
    }

    public function getPhone()
    {
        return $this->input('phone');
    }

    public function getPostalCode()
    {
        return $this->input('post_code');
    }

    public function getCity()
    {
        return $this->input('city');
    }

    public function getStreet()
    {
        return $this->input('street');
    }

    public function getBankAccount()
    {
        return $this->input('bank_account');
    }

    public function getSocialSecurity()
    {
        return $this->input('social_security');
    }

    public function getSalaryPerHour()
    {
        return $this->input('salary_per_hour');
    }
}
