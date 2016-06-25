<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request
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
            
            'title'    => 'required',
            'body'     => 'required',
            //$table->integer('assign_to');
            //$table->boolean('status');
            'users' => 'required',
            'deadline' => ['required','date']

            //$table->integer('user_id');
        ];
    }
}
