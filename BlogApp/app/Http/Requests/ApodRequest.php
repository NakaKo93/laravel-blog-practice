<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ApodRequest extends ApiRequest
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
            'start_date' => 'required|date_format:Y-n-d',
            'end_date' => 'required|date_format:Y-n-d'
        ];
    }
}
