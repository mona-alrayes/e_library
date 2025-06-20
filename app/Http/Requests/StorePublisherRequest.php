<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublisherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'PName' => 'required|string|unique:publishers,PName',
            'Country' => 'required|string',
        ];
    }
}
