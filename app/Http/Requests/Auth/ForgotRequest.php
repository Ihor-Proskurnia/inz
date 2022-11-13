<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Rules\Auth\EmailExistRule;
use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

class ForgotRequest extends FormRequest implements IForgotRequest
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
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/(.+)@(.+)\\.(.+)/i',
                new EmailExistRule(),
            ],
        ];
    }

    public function getEmail()
    {
        return $this->input('email');
    }
}
