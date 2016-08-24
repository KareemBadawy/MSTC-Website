<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
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
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'started_at' => 'required|date',
            'ended_at' => 'required|date',
            'image' => 'image|max:2000',
        ];
        $nbr = count($this->input('gallery')) - 1;
        foreach (range(0, $nbr) as $index) {
            $rules['gallery.' . $index] = 'image|max:2000';
        }
        return $rules;
    }
}
