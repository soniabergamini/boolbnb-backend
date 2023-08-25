<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
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
            "name" => 'required|min:4',
            'room_number' => 'required|numeric|min:1',
            "bed_number" => 'required|numeric|min:1',
            'bathroom_number' => 'required|numeric|min:1',
            'square_meters' => 'required|numeric|min:10',
            'address' => 'required|min:10',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'image' => 'required|image|max:10240',
            'visible' => 'required|boolean',
            'user_id' => 'exists:user,id|nullable',
            'services' => 'exists:services,id|nullable',
        ];
    }
}
