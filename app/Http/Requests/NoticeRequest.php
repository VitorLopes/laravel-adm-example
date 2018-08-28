<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'credit_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titulo inválido ou inexistente',
            'body.email' => 'Texto inválido ou inexistente',
            'credit_id.required' => 'Escolha o Credito'
        ];
    }
}
