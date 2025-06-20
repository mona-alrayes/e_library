<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Title' => 'required|string',
            'Type' => 'required|string',
            'Price' => 'required|numeric',
            'Publisher_id' => 'required|exists:publishers,id',
            'Author_id' => 'required|exists:authors,id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
