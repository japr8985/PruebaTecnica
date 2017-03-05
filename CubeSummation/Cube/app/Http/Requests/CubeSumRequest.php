<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CubeSumRequest extends FormRequest
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
            'x1' => 'numeric|min:1|max:100',
            'y1' => 'numeric|min:1|max:100',
            'z1' => 'numeric|min:1|max:100',
            'x2' => 'numeric|min:1|max:100',
            'y2' => 'numeric|min:1|max:100',
            'z2' => 'numeric|min:1|max:100'
        ];
    }
}
