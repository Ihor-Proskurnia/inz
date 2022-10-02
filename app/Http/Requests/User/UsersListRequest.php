<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\User\IUsersListRequest;

class UsersListRequest extends FormRequest implements IUsersListRequest
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

    public function validationData()
    {
        // adding default value
        if (is_null($this->get('name_sort'))) {
            $this->query->add(['id' => 'ASC']);
        }

        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'name_sort' =>
                ['string', 'in:ASC,DESC'],
            'surname_sort' =>
                ['string', 'in:ASC,DESC'],
            'per_page' => 'numeric|gt:0',
            'page' => 'numeric|gt:0',
        ];
    }

    public function getPerPage(): int
    {
        return (int)$this->input('per_page', 10);
    }

    public function getPage(): int
    {
        return (int)$this->input('page');
    }
}
