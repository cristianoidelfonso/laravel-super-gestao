@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Listagem de Pedidos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%;margin: 0 auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CLIENTE</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido'=>$pedido->id]) }}">Adicionar produtos</a></td>
                                <td><a href="{{route('pedido.show', ['pedido'=>$pedido->id]) }}">Ver</a></td>
                                <td><a href="{{route('pedido.edit', ['pedido'=>$pedido->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}"method="post" action="{{route('pedido.destroy', ['pedido'=>$pedido->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Nenhum cliente cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}
                <br>
                Exibindo {{$pedidos->count()}} pedidos de um total de {{$pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
                <br>

{{--
                {{ $pedidos->count() }} - Total de registros por pagina.
                <br>
                {{ $pedidos->total() }} - Total de registros na consulta.
                <br>
                {{ $pedidos->firstItem() }} - Número do primeiro registro na página.
                <br>
                {{ $pedidos->lastItem() }} - Número do último registro na página.
--}}

            </div>
        </div>


    </div>

@endsection
