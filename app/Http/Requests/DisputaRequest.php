<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisputaRequest extends FormRequest
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
            'produto_id' => ['required'],
            'preco' => ['required','regex:/^\d*(\.\d{1,2})?$/','min:1','max:8'],
            'preco_concorrente' => ['required','regex:/^\d*(\.\d{1,2})?$/','min:1','max:8'],
            'status' => ['required'],

        ];
    }
}
