<?php

namespace App\Http\Requests;

class ValueRequest extends RequestWrapper
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'calculationTime' => 'required|numeric|between:10,10000'
        ];
    }
}
