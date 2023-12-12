<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property $section_id int
 * @property $name string
 * @property $description string
 * @property $image file
 * @property $cafe_id int
 * @property $price float
 * @property $status bool
 * @property $data array
 */


class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'section_id' => 'required|integer|exists:sections,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'cafe_id' => 'required|integer|exists:cafes,id',
            'price' => 'required|numeric',
        ];
    }
}
