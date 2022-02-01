<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('app.fornecedor.index', ['titulo'=>'Fornecedor', 'fornecedores'=>$fornecedores]);
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])
                                    ->where('nome', 'like', '%'.$request->input('nome').'%')
                                    ->where('site', 'like', '%'.$request->input('site').'%')
                                    ->where('uf', 'like', '%'.$request->input('uf').'%')
                                    ->where('email', 'like', '%'.$request->input('email').'%')
                                    ->paginate(2);
                                    // ->get();

        // dd($fornecedores);
        return view('app.fornecedor.listar', ['titulo'=>'Fornecedor','fornecedores'=>$fornecedores, 'request'=>$request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        // create
        if($request->input('_token') != '' && $request->input('id') == ''){
            // Validação
            $regras = [
                'nome'  => 'required | min:3 | max:45',
                'site'  => 'required',
                'uf'    => 'required | min:2 | max:2',
                'email' => 'required | email',
            ];

            $feedback = [
                'required'  => 'O campo :attribute deve ser preenchido.',
                'nome.min'  => 'O campo :attribute deve possuir no mínimo 3 caracteres.',
                'nome.max'  => 'O campo :attribute deve possuir no máximo 45 caracteres.',
                'uf.min'  => 'O campo :attribute deve possuir no mínimo 2 caracteres.',
                'uf.max'  => 'O campo :attribute deve possuir no máximo 2 caracteres.',
                'email'  => 'O campo :attribute não foi preenchido corretamente.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';

        }

        // update
        if($request->input('_token') != '' && $request->input('id') != ''){

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = "Atualização realizada com sucesso!";
            }else{
                $msg = "Erro ao tentar atualizar o registro.";
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'msg'=>$msg]);
        }
        return view('app.fornecedor.adicionar', ['titulo'=>'Fornecedor', 'msg'=>$msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['titulo'=>'Fornecedor', 'fornecedor'=>$fornecedor, 'msg'=>$msg]);
    }

    public function excluir($id)
    {
        // echo "Remover o registro de ID $id";
        Fornecedor::find($id)->delete(); // Atribui a data ao SoftDeletes, não excluindo o registro do banco de dados.
        // Fornecedor::find($id)->forceDelete(); // Exclui o registro do banco de dados.

        return redirect()->route('app.fornecedor');
    }
}
