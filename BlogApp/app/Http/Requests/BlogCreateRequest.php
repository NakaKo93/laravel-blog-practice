<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class BlogCreateRequest extends ApiRequest
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
            'title' => 'required|string|max:20',
            'explanation' => 'required|string|max:255',
            'published_date' => 'nullable|date_format:Y-n-d H:i:s',
            'published_flg' => 'required|boolean',
            'delete_flg' => 'required|boolean'
        ];
    }
}
