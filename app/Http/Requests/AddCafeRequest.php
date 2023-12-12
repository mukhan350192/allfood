<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property $city_id integer
 * @property $status boolean
 * @property $name string
 * @property $image string
 * @property $rating double
 * @property $latitude string
 * @property $longitude string
 * @property $min_order integer
 * @property $delivery_price integer
 * @property $time_delivery string
 * @property $sections array
 */
class AddCafeRequest extends FormRequest
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
            'city_id' => 'required|integer|exists:cities,id',
            'name' => 'required|string',
            'image' => 'required|max:4000|mimes:jpeg,jpg,png',
            //'rating' => 'required|numeric',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'min_order' => 'required|integer',
            'delivery_price' => 'required|integer',
            'time_delivery' => 'required|string',
            'sections' => 'required|array',
            'sections.*' => 'required|integer|exists:sections,id'
        ];
    }
}
