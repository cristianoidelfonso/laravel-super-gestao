@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Produto Detalhe - Editar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li>
                {{-- <li><a href="">Consulta</a></li> --}}
            </ul>
        </div>

        <div class="informacao-pagina">

            {{ $msg ?? '' }}

            <h4>Produto</h4>
            <div>Nome: {{$produto_detalhe->produto->nome}}</div>
            <br>
            <div>Descrição: {{$produto_detalhe->produto->descricao}}</div>

            <div style="width: 30%;margin: 0 auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['btn'=>'Atualizar','produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])

                @endcomponent
            </div>
        </div>


    </div>

@endsection
