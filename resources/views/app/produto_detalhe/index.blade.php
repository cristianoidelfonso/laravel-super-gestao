@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Produto detalhes</h1>
        </div>


        <div class="menu">
            <ul>
                <li><a href="{{route('produto-detalhe.create')}}">Novo</a></li>
                {{-- <li><a href="">Consulta</a></li> --}}
            </ul>
        </div>

        <div class="informacao-pagina">

                {{ $msg ?? '' }}

            <div style="width: 80%;margin: 0 auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PRODUTO ID</th>
                            <th>COMPRIMENTO</th>
                            <th>LARGURA</th>
                            <th>ALTURA</th>
                            <th>UNIDADE ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produto_detalhes as $produto_detalhe)
                            <tr>
                                <td>{{ $produto_detalhe->id }}</td>
                                <td>{{ $produto_detalhe->produto_id }}</td>
                                <td>{{ $produto_detalhe->comprimento }}</td>
                                <td>{{ $produto_detalhe->largura }}</td>
                                <td>{{ $produto_detalhe->altura }}</td>
                                <td>{{ $produto_detalhe->unidade_id }}</td>
                                <td><a href="{{route('produto-detalhe.show', ['produto_detalhe'=>$produto_detalhe->id]) }}">Ver</a></td>
                                <td><a href="{{route('produto-detalhe.edit', ['produto_detalhe'=>$produto_detalhe->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$produto_detalhe->id}}"method="post" action="{{route('produto-detalhe.destroy', ['produto_detalhe'=>$produto_detalhe->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto_detalhe->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Nenhum produto cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $produto_detalhes->appends($request)->links() }} --}}
                <br>
                {{-- Exibindo {{$produto_detalhes->count()}} produtos de um total de {{$produto_detalhes->total()}} (de {{$produto_detalhes->firstItem()}} a {{$produto_detalhes->lastItem()}}) --}}
                <br>

{{--
                {{ $produtos->count() }} - Total de registros por pagina.
                <br>
                {{ $produtos->total() }} - Total de registros na consulta.
                <br>
                {{ $produtos->firstItem() }} - Número do primeiro registro na página.
                <br>
                {{ $produtos->lastItem() }} - Número do último registro na página.
--}}

            </div>
        </div>


    </div>

@endsection
