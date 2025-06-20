<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'FName' => 'required|string',
            'LName' => 'required|string',
            'Country' => 'required|string',
            'City' => 'required|string',
            'Address' => 'required|string',
        ];
    }
}
