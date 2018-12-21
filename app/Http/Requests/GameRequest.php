<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'name' => 'required|min:5|unique:games',
            'level' => 'required|integer',
            'missions' => 'required|integer',
            'playersNo' => 'required|integer',
            'city' => 'required',
            'region' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Abbas: title is required',
            'name.unique' => 'Abbas: slug is duplicate',
            'name.min' => 'Abbas: slug is required',
            'level.required'  => 'A post text is required',
            'mission.required'  => 'A post text is required',
            'playersNo.required'  => 'A post text is required',
            'city.required'  => 'A post text is required',
            'region.required'  => 'A post text is required',
        ];
    }
}
