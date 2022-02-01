<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;
use App\Http\Requests\SiteContatoRequest;

class ContatoController extends Controller
{
     public function index(Request $request)
     {
        // var_dump($_POST);
        // dd($request);

        // Modo 1
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // Modo 2 - Preenche os dados e depois salva no banco de dados
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        // Modo 3 - Create o objeto direto no banco de dados
        // $contato = new SiteContato();
        // $contato->create($request->all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo'=>'Contato', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(SiteContatoRequest $request)
    {
        // Fazer validação dos dados da requisição
        // $regras = [
        //     'nome'          =>'required | min:2 | max:50',
        //     'telefone'      =>'required',
        //     'email'         =>'required | email',
        //     'motivo_contato_id'=>'required',
        //     'mensagem'      =>'required | max:1500',
        // ];
        // $feedback = [
        //     'required'              => 'O campo :attribute precisa ser preenchido.',
        //     'nome.min'              => 'O campo nome precisa ter no minimo 2 caracteres.',
        //     'nome.max'              => 'O campo nome deve ter no máximo 50 caracteres.',
        //     'email.email'           => 'E-mail inválido',
        //     'mensagem.max'          => 'O campo :attribute deve ter no máximo 1500 caracteres.',
        // ];
        // $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
