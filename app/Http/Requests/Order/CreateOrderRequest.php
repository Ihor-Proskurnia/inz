<?php

declare(strict_types=1);

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Order\ICreateOrderRequest;

class CreateOrderRequest extends FormRequest implements ICreateOrderRequest
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
        $rules = [
            'category_id' => 'required|int|exists:categories,id',
            'date' => 'string|date_format:Y-m-d',
            'from_time' => 'string|max:10',
            'to_time' => 'string|max:10',
            'name' => 'string|max:255',
            'description' => 'string',
        ];

        return $rules;
    }

    public function getCategoryId(): int
    {
        return $this->input('category_id');
    }

    public function getDate(): string
    {
        return $this->input('date');
    }

    public function getFromTime(): string
    {
        return $this->input('from_time');
    }

    public function getToTime(): string
    {
        return $this->input('to_time');
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getDescription(): string
    {
        return $this->input('description');
    }
}
