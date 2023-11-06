<?php

namespace App\Http\Requests\Advertising;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'platform' => 'required|string|min:3',
            'impressions' => 'required|integer|min:0',
            'clicks' => 'required|integer|min:0',
            'spend' => 'required|numeric|min:0',
            'revenue' => 'required|numeric|min:0',
        ];
    }
}
