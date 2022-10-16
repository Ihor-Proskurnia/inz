<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\User\IActivateUserRequest;

class ActivateUserRequest extends FormRequest implements IActivateUserRequest
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
            'user_id' => 'required|numeric',
        ];
    }

    public function getUserId(): int
    {
        return (int)$this->input('user_id');
    }
}
