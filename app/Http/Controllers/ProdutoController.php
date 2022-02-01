<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Fornecedor;
use App\Models\ProdutoDetalhe;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $produtos = Produto::where('nome', 'like', '%'.$request->input('nome').'%')
        //                             ->where('site', 'like', '%'.$request->input('site').'%')
        //                             ->where('uf', 'like', '%'.$request->input('uf').'%')
        //                             ->where('email', 'like', '%'.$request->input('email').'%')
        //                             ->paginate(10);
        //                             // ->get();

        $produtos = Produto::with(['produtoDetalhe', 'fornecedor'])->paginate(5);

        // foreach ($produtos as $key => $produto) {
        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if(isset($produtoDetalhe)){
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // }

        return view('app.produto.index', ['titulo'=>'Produto','produtos'=>$produtos, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['titulo'=>'Produto', 'unidades'=>$unidades, 'fornecedores'=>$fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        // $regras = [
        //     'nome'      => 'required | min:3 | max:64',
        //     'descricao' => 'required | min:3 | max:1800',
        //     'peso'      => 'required | integer',
        //     'unidade_id'=> 'required | exists:unidades,id',
        // ];
        // $feedback = [
        //     'required'      => 'O campo :attribute deve ser preenchido.',
        //     'nome.min'      => 'O campo :attribute deve possuir no mínimo :min caracteres.',
        //     'nome.max'      => 'O campo :attribute deve possuir no máximo :max caracteres',
        //     'descricao.min' => 'O campo :attribute deve possuir no mínimo :min caracteres.',
        //     'descricao.max' => 'O campo :attribute deve possuir no máximo :max caracteres',
        //     'peso.integer'  => 'O campo :attribute deve ser um número inteiro.',
        //     'unidade_id.required'  => 'O campo :attribute deve ser selecionado.',
        //     'unidade_id.exists'  => 'A unidade de medida informada não está cadastrada.',
        // ];
        // $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        // dd($produto);
        return view('app.produto.show', ['titulo'=>'Produto', 'produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['titulo'=>'Produto', 'produto'=>$produto, 'unidades'=>$unidades, 'fornecedores'=>$fornecedores,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, Produto $produto)
    {
        // print_r($request->all());  //payload ...dados do formulário...
        // echo '<br><hr><br>';
        // print_r($produto->getAttributes());  //instancia do objeto

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto'=>$produto->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        // dd($produto);
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
