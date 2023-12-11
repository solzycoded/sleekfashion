<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address'      => 'required|string|max:200',
            'phone_number' => 'required|numeric|max_digits:11|not_regex:/^[a-z]+$/i',
            'first_name'   => 'required|string|max:120',
            'last_name'    => 'required|string|max:120',
            'reference'    => 'required|string'
        ];
    }
}
