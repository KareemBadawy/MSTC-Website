<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScoreRequest extends Request
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
            'creativity'    => ['required','integer','max:10'],
            'time'    => ['required','integer','max:10'],
            'quality'    => ['required','integer','max:10'],
            'numberofedits'    => ['required','integer','max:10'],
            'bouns'    => ['required','integer','max:10'],
            'user_id' => ['required','integer']
        ];
    }
}
