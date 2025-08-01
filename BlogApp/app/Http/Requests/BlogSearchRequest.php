<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class BlogSearchRequest extends ApiRequest
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
            'category_id' => 'required|integer',
            'published_date' => 'required|date_format:Y-n-d H:i:s',
            'published_flg' => 'required|boolean'
        ];
    }
}
