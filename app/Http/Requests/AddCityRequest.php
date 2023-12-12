<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $name string
 * @property $status boolean
 * @property $latitude string
 * @property $longitude string
 * @property $polygon string
 * @property $square_polygon string
 */
class AddCityRequest extends FormRequest
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
            'name' => 'required|string',
            'status' => 'required|integer',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'polygon' => 'required|string',
            'square_polygon' => 'required|string'
        ];
    }
}
