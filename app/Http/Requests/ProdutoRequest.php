<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome'      => 'required | min:3 | max:64',
            'descricao' => 'required | min:3 | max:1800',
            'peso'      => 'required | integer',
            'unidade_id'=> 'required | exists:unidades,id',
            'fornecedor_id'=> 'required | exists:fornecedores,id',
        ];
    }

    public function messages()
    {
        return [
            'required'      => 'O campo :attribute deve ser preenchido.',

            'nome.min'      => 'O campo :attribute deve possuir no mínimo :min caracteres.',
            'nome.max'      => 'O campo :attribute deve possuir no máximo :max caracteres',

            'descricao.min' => 'O campo :attribute deve possuir no mínimo :min caracteres.',
            'descricao.max' => 'O campo :attribute deve possuir no máximo :max caracteres',

            'peso.integer'  => 'O campo :attribute deve ser um número inteiro.',

            'unidade_id.required'  => 'O campo :attribute deve ser selecionado.',
            'unidade_id.exists'  => 'A unidade de medida informada não está cadastrada.',

            'fornecedor_id.required'  => 'O campo :attribute deve ser selecionado.',
            'fornecedor_id.exists'  => 'O fornecedor informado não está cadastrado.',
        ];
    }
}
