<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos_detalhes = ProdutoDetalhe::all();

        return view('app.produto_detalhe.index',[
                'titulo'=>'Produto detalhes',
                'produto_detalhes'=>$produtos_detalhes,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['titulo'=>'Pdoduto detalhe', 'unidades'=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());

        echo  'Cadastro realizado com sucesso!';
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        dd($produto_detalhe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();

        return view('app.produto_detalhe.edit',[
                'titulo'=>'Editar produto detalhe',
                'produto_detalhe'=>$produto_detalhe,
                'unidades'=>$unidades
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());

        $msg = 'Produto detalhe atualizado com sucesso!';

        return redirect()->route('produto-detalhe.index',['msg'=>$msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ProdutoDetalhe $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produto_detalhe)
    {
        $msg = 'Método Destroy';

        return redirect()->route('produto-detalhe.index');
    }
}
