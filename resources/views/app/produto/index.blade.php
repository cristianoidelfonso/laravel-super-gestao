@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Produto - Listar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                {{-- <li><a href="">Consulta</a></li> --}}
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%;margin: 0 auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>DESCRIÇÂO</th>
                            <th>NOME DO FORNECEDOR</th>
                            <th>SITE DO FORNECEDOR</th>
                            <th>PESO</th>
                            <th>COMPRIMENTO</th>
                            <th>ALTURA</th>
                            <th>LARGURA</th>
                            <th>UNIDADE ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td><a href="https://google.com.br" target="_blank">{{ $produto->fornecedor->site }}</a></td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{route('produto.show', ['produto'=>$produto->id]) }}">Ver</a></td>
                                <td><a href="{{route('produto.edit', ['produto'=>$produto->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}"method="post" action="{{route('produto.destroy', ['produto'=>$produto->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedido(s)</p>
                                    @forelse ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido'=>$pedido->id])}}">
                                            Pedido: {{ $pedido->id }} ,
                                        </a>
                                    @empty

                                    @endforelse
                                </td>
                            </tr>
                        @empty
                            {{ 'Nenhum produto cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{$produtos->count()}} produtos de um total de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
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
