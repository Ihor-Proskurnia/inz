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
}
