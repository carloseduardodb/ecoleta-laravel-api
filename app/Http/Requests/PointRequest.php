<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'whatsapp' => 'required|min:3',
            'latitude' => 'required|min:3',
            'longitude' => 'required|min:3',
            'city' => 'required|min:3',
            'uf' => 'required|max:3',
        ];
    }
}
