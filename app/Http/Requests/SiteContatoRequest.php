<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * If the authorize() method returns false, a HTTP response with a 403 status code will
     * automatically be returned and your controller method will not execute.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'nome'          =>'required | min:2 | max:50',
            'telefone'      =>'required',
            'email'         =>'required | email',
            'motivo_contato_id'=>'required',
            'mensagem'      =>'required | max:1500',
        ];
    }

    public function messages()
    {
        return [
            'required'      => 'O campo :attribute precisa ser preenchido.',
            'nome.min'      => 'O campo nome precisa ter no minimo 2 caracteres.',
            'nome.max'      => 'O campo nome deve ter no máximo 50 caracteres.',
            'email.email'   => 'E-mail inválido',
            'mensagem.max'  => 'O campo :attribute deve ter no máximo 1500 caracteres.',
        ];
    }
}
