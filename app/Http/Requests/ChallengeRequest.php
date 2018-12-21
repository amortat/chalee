<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|unique:missions',
            'game_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Abbas: title is required',
            'slug.unique' => 'Abbas: slug is duplicate',
        ];
    }
}
