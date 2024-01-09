<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'name' => 'required|string',
            'nickname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country_city' => 'required|string',
            'address' => 'required|string',
            'country' => 'required|string',
            'square' => 'required|string', // Assuming 'square' is a numeric value
        ];
    }
}
